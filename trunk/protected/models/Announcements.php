<?php

/**
 * This is the model class for table "announcements".
 *
 * The followings are the available columns in table 'announcements':
 * @property integer $id
 * @property string $company
 * @property string $address
 * @property string $zip
 * @property string $city
 * @property string $phone
 * @property integer $category_id
 * @property string $reference
 * @property string $title
 * @property string $email
 * @property string $image
 * @property string $grip
 * @property string $description
 * @property integer $is_highlight
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property AnnouncementCategorys $category
 * @property AnnouncementCenters[] $announcementCenters
 */
class Announcements extends CActiveRecord
{
	const STATUS_YES = 1;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Announcements the static model class
	 */
    public $name_category;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'announcements';
	}
    public function behaviors()
    {
        return array('datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior')); 
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company, category_id, title, email', 'required'),
            array('email','email'),
            array('phone', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
			array('category_id, is_highlight', 'numerical', 'integerOnly'=>true),
			array('company, address, zip, city, title, email, image, grip', 'length', 'max'=>255),
			array('phone, reference', 'length', 'max'=>150),
			array('description, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company, address, zip, city, phone, category_id, reference, title, email, image, grip, description, is_highlight, created, updated, name_category', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'AnnouncementCategorys', 'category_id'),
            'announcementCenters' => array(self::HAS_MANY, 'AnnouncementCenters', 'announcement_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'company' => Yii::t('global', 'Company'),
			'address' => Yii::t('global', 'Address'),
			'zip' => Yii::t('global', 'Zip'),
			'city' => Yii::t('global', 'City'),
			'phone' => Yii::t('global', 'Phone'),
			'category_id' => Yii::t('global', 'Category'),
			'reference' => Yii::t('global', 'Reference'),
			'title' => Yii::t('global', 'Title'),
			'email' => Yii::t('global', 'Email'),
			'image' => Yii::t('global', 'Image'),
			'grip' => Yii::t('global', 'Grip'),
			'description' => Yii::t('global', 'Description'),
			'is_highlight' => Yii::t('global', 'Is Highlight'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
        $criteria->together = true;
        $criteria->with = array('category');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('grip',$this->grip,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('is_highlight',$this->is_highlight);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);
        $criteria->compare('category.name',$this->name_category, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'name_category'=>array(
                        'asc'=>'category.name',
                        'desc'=>'category.name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    public function getStatus( $status ){
        $name = Yii::t('global','No');
        if( $status == self::STATUS_YES )
            $name = Yii::t('global','Yes');
        return $name;
    }

    function showAdminImageNew( $image ){
        $image = ($image != '')?$image:'no_image.gif';
        return '<a class="fancybox" href="/uploads/announcements/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/announcements/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function getAnnouncementsCentersId(){
        if ($this->id){
            $models = AnnouncementCenters::model()->findAllByAttributes(array('announcement_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->centers_id;

            return $arr;
        }
        return array();
    }

    function getAnnouncementsCenters( $id ){
        $catProducts = AnnouncementCenters::model()->findAllByAttributes(array('announcement_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view?id='.$catProduct['centers']['id']).">".$catProduct['centers']['corporate_name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'company',
        ));
        foreach($models as $model){
            $arr[$model->id]['company']=$model->company;
        }
    }

}