<?php

/**
 * This is the model class for table "chips".
 *
 * The followings are the available columns in table 'chips':
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $video
 * @property integer $range_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property ChipVideos[] $chipVideoses
 * @property Ranges $range
 * @property SupplierProducts[] $supplierProducts
 */
class Chips extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Chips the static model class
	 */
    public $range_name;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chips';
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
			array('name', 'required'),
			array('range_id', 'numerical', 'integerOnly'=>true),
			array('name, image, video', 'length', 'max'=>255),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, image, video, range_id, created, updated, range_name', 'safe', 'on'=>'search'),
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
            'chipVideoses' => array(self::HAS_MANY, 'ChipVideos', 'chip_id'),
            'range' => array(self::BELONGS_TO, 'Ranges', 'range_id'),
            'supplierProducts' => array(self::HAS_MANY, 'SupplierProducts', 'chip_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'name' => Yii::t('global', 'Name'),
            'image' => Yii::t('global', 'Logo'),
			'video' => Yii::t('global', 'Video'),
			'range_id' => Yii::t('global', 'Range'),
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
        $criteria->with     = array('range');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('name',$this->name,true);
        $criteria->compare('image',$this->image,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('range_id',$this->range_id);
        $criteria->compare('range.name',$this->range_name);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'range_name'=>array(
                        'asc'=>'range.name',
                        'desc'=>'range.name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    function showAdminImage(){
        $image = isset($this->image)?$this->image:'no_image.gif';
        return '<a class="fancybox" href="/uploads/chips/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/chips/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function showAdminImageNew( $image ){
        $image = isset($image)?$image:'no_image.gif';
        return '<a class="fancybox" href="/uploads/chips/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/chips/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    public function getOtherChipVideos(){
        if ($this->id){
            $models = ChipVideos::model()->findAllByAttributes(array('chip_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    function getFullChipVideos( $id ){
        $catProducts        = ChipVideos::model()->findAllByAttributes(array('chip_id' => $id));
        $id                 = array();
        foreach ( $catProducts as $key=>$val ){
            $id[$key] = $val['video_id'];
        }
        $ids = implode(',',$id);
        $ids = ($ids != '')?$ids:0;
        $listProduct        = Videos::model()->findAll('id IN ('.$ids.')');
        $listCatProduct     = "";
        foreach($listProduct as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view?id='.$catProduct['id']).">".$catProduct['title']."</a></label>";
        }
        return $listCatProduct;
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'name',
        ));
        foreach($models as $model){
            $arr[$model->id]['name']=$model->name;
        }
    }

}