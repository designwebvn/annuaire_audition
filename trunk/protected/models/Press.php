<?php

/**
 * This is the model class for table "press".
 *
 * The followings are the available columns in table 'press':
 * @property integer $id
 * @property string $name
 * @property string $corporate_name
 * @property string $newspaper_title
 * @property integer $advertisers
 * @property string $description
 * @property string $image
 * @property string $address
 * @property string $additional_address
 * @property string $city
 * @property string $zip
 * @property string $po_box
 * @property string $zip_cedex
 * @property string $city_cedex
 * @property integer $country
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $website
 * @property string $phone_2
 * @property string $email_2
 * @property string $website_2
 * @property integer $delFlg
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property NewspapersTitles[] $newspapersTitles
 * @property Countries $country0
 * @property PressNews[] $pressNews
 */
class Press extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Press the static model class
	 */
    const STATUS_YES  = 1;
    public $newspaper;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'press';
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
		// NOTE: you should only define rules for those attributes that newspaper_title
		// will receive user inputs.
		return array(
			array('name, advertisers, address, city, zip', 'required'),
            array('email','email'),
            array('phone, fax', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
            array('website, website_2', 'url', 'defaultScheme' => 'http'),
			array('advertisers, country, delFlg', 'numerical', 'integerOnly'=>true),
			array('name, corporate_name, newspaper_title, image, address, additional_address, city, zip, po_box, zip_cedex, city_cedex, phone', 'length', 'max'=>255),
			array('fax, email, website, phone_2, email_2, website_2', 'length', 'max'=>150),
			array('description, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, corporate_name, newspaper_title, advertisers, description, image, address, additional_address, city, zip, po_box, zip_cedex, city_cedex, country, phone, fax, email, website, phone_2, email_2, website_2, delFlg, created, updated, newspaper', 'safe', 'on'=>'search'),
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
            'newspapersTitles' => array(self::HAS_MANY, 'NewspapersTitles', 'press_id'),
			'country0' => array(self::BELONGS_TO, 'Countries', 'country'),
            'pressNews' => array(self::HAS_MANY, 'PressNews', 'press_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'name' => Yii::t('global', 'Corporate Name'),
			'corporate_name' => Yii::t('global', 'Corporate Name 2'),
			'newspaper_title' => Yii::t('global', 'Newspaper Title'),
			'advertisers' => Yii::t('global', 'Advertiser'),
			'description' => Yii::t('global', 'Description'),
			'image' => Yii::t('global', 'Logo'),
			'address' => Yii::t('global', 'Address'),
			'additional_address' => Yii::t('global', 'Additional Address'),
			'city' => Yii::t('global', 'City'),
			'zip' => Yii::t('global', 'Zip'),
			'po_box' => Yii::t('global', 'Po Box'),
			'zip_cedex' => Yii::t('global', 'Zip Cedex'),
			'city_cedex' => Yii::t('global', 'City Cedex'),
			'country' => Yii::t('global', 'Country'),
			'phone' => Yii::t('global', 'Phone'),
			'fax' => Yii::t('global', 'Fax'),
			'email' => Yii::t('global', 'Email'),
			'website' => Yii::t('global', 'Website'),
			'phone_2' => Yii::t('global', 'Phone 2'),
			'email_2' => Yii::t('global', 'Email 2'),
			'website_2' => Yii::t('global', 'Website 2'),
			'delFlg' => Yii::t('global', 'Del Flg'),
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
        $criteria->with     = array('newspapersTitles');

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('corporate_name',$this->corporate_name,true);
		$criteria->compare('newspaper_title',$this->newspaper_title,true);
		$criteria->compare('advertisers',$this->advertisers);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('additional_address',$this->additional_address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('zip_cedex',$this->zip_cedex,true);
		$criteria->compare('city_cedex',$this->city_cedex,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('email_2',$this->email_2,true);
		$criteria->compare('website_2',$this->website_2,true);
		$criteria->compare('delFlg',$this->delFlg);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'newspaper'=>array(
                        'asc'=>'newspapersTitles.title',
                        'desc'=>'newspapersTitles.title DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    function showAdminImage(){
        return '<a class="fancybox" href="'.Yii::app()->params['homeUrl'].'/uploads/press/'.$this->image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="'.Yii::app()->params['homeUrl'].'/uploads/press/'.$this->image.'" style="height: 40px;"/>
				</a>';
    }

    function getActivePress(){
        $active_press = array(
            Yii::t('global','No'),
            Yii::t('global','Yes')
        );
        return $active_press;
    }

    function getStatusPress( $status ){
        if($status==self::STATUS_YES)
            return Yii::t('global','Yes');
        return Yii::t('global','No');
    }

    function getNewspapersTitle( $id ){
        $catProducts = NewspapersTitles::model()->findAllByAttributes(array('press_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> ".$catProduct['title']."</label>";
        }
        return $listCatProduct;
    }

    public function getAllCategory(){
        $allCategory = self::model()->findAll();
        $category = array();
        foreach($allCategory as $item) {
            $category[$item['id']]=$item['name'];
        }
        return $category;
    }

    public function getPressNewsId(){
        if ($this->id){
            $models = PressNews::model()->findAllByAttributes(array('press_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->news_id;

            return $arr;
        }
        return array();
    }

    function getPressNews($id){
        $catProducts = PressNews::model()->findAllByAttributes(array('press_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view/?id='.$catProduct['news']['id']).">".$catProduct['news']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

}