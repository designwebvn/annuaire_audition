<?php

/**
 * This is the model class for table "training_centers".
 *
 * The followings are the available columns in table 'training_centers':
 * @property integer $id
 * @property string $school_name
 * @property string $school_name_2
 * @property integer $advertiser
 * @property integer $type_of_training
 * @property string $degree
 * @property string $description_1
 * @property string $description_2
 * @property string $address_1
 * @property string $additional_address_1
 * @property string $additional_address_2
 * @property string $city_1
 * @property integer $country_1
 * @property string $po_box_1
 * @property string $po_box_zip_1
 * @property string $zip_cedex_1
 * @property string $city_cedex_1
 * @property string $phone_1_address_1
 * @property string $phone_2_address_2
 * @property string $fax_address_1
 * @property string $fax_address_2
 * @property string $address_2
 * @property string $additional_address_bis_1
 * @property string $additional_address_bis_2
 * @property string $city_2
 * @property integer $country_2
 * @property string $zip_2
 * @property string $po_box_2
 * @property string $zip_cedex_2
 * @property string $city_cedex_2
 * @property string $phone_1_address_2
 * @property string $phone_2_address_21
 * @property string $fax_1_address_2
 * @property string $fax_2_address_2
 * @property string $email_1
 * @property string $email_2
 * @property string $email_3
 * @property string $website
 * @property string $website_2
 * @property string $logo
 * @property string $image
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Professionals[] $professionals
 * @property TrainingCentersType[] $trainingCentersTypes
 * @property TrainingCentersDegrees[] $trainingCentersDegrees
 */
class TrainingCenters extends CActiveRecord
{
    const STATUS_YES  = 1;
    public $name_type_of_training;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrainingCenters the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'training_centers';
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
			array('school_name, address_1, city_1, country_1, po_box_1, advertiser', 'required'),
			array('email_1, email_2, email_3','email'),
            array('phone_1_address_1, phone_2_address_2, fax_address_1, fax_address_2, phone_1_address_2, phone_2_address_21, fax_1_address_2, fax_2_address_2', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
            array('website, website_2', 'url', 'defaultScheme' => 'http'),
            array('advertiser, type_of_training, country_1, country_2', 'numerical', 'integerOnly'=>true),
			array('school_name, school_name_2, description_1, description_2, address_1, additional_address_1, additional_address_2, city_1, po_box_1, po_box_zip_1, zip_cedex_1, city_cedex_1, phone_1_address_1, phone_2_address_2, fax_address_1, fax_address_2, address_2, additional_address_bis_1, additional_address_bis_2, city_2, logo, image', 'length', 'max'=>255),
			array('degree, zip_2, po_box_2, zip_cedex_2, city_cedex_2, phone_1_address_2, phone_2_address_21, fax_1_address_2, fax_2_address_2, email_1, email_2, email_3, website, website_2', 'length', 'max'=>150),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, school_name, school_name_2, advertiser, type_of_training, degree, description_1, description_2, address_1, additional_address_1, additional_address_2, city_1, country_1, po_box_1, po_box_zip_1, zip_cedex_1, city_cedex_1, phone_1_address_1, phone_2_address_2, fax_address_1, fax_address_2, address_2, additional_address_bis_1, additional_address_bis_2, city_2, country_2, zip_2, po_box_2, zip_cedex_2, city_cedex_2, phone_1_address_2, phone_2_address_21, fax_1_address_2, fax_2_address_2, email_1, email_2, email_3, website, website_2, logo, image, created, updated, name_type_of_training', 'safe', 'on'=>'search'),
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
            'professionals' => array(self::HAS_MANY, 'Professionals', 'training_center'),
		    /*'typeOfTraining'=>array(self::BELONGS_TO, 'TypeTraining', 'type_of_training'),*/
            'trainingCentersTypes' => array(self::HAS_MANY, 'TrainingCentersType', 'training_centers_id'),
            'trainingCentersDegrees' => array(self::HAS_MANY, 'TrainingCentersDegrees', 'training_centers_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'school_name' => Yii::t('global', 'School Name'),
			'school_name_2' => Yii::t('global', 'School Name 2'),
			'advertiser' => Yii::t('global', 'Advertiser'),
			'type_of_training' => Yii::t('global', 'Category'),
			'degree' => Yii::t('global', 'Degree'),
			'description_1' => Yii::t('global', 'Description 1'),
			'description_2' => Yii::t('global', 'Description 2'),
			'address_1' => Yii::t('global', 'Address 1'),
			'additional_address_1' => Yii::t('global', 'Additional Address 1'),
			'additional_address_2' => Yii::t('global', 'Additional Address Bis 1'),
			'city_1' => Yii::t('global', 'City 1'),
			'country_1' => Yii::t('global', 'Country 1'),
			'po_box_1' => Yii::t('global', 'Po Box 1'),
			'po_box_zip_1' => Yii::t('global', 'Po Box Zip 1'),
			'zip_cedex_1' => Yii::t('global', 'Zip Cedex 1'),
			'city_cedex_1' => Yii::t('global', 'City Cedex 1'),
			'phone_1_address_1' => Yii::t('global', 'Phone 1 Address 1'),
			'phone_2_address_2' => Yii::t('global', 'Phone 2 Address 2'),
			'fax_address_1' => Yii::t('global', 'Fax Address 1'),
			'fax_address_2' => Yii::t('global', 'Fax Address 2'),
			'address_2' => Yii::t('global', 'Address 2'),
			'additional_address_bis_1' => Yii::t('global', 'Additional Address 2'),
			'additional_address_bis_2' => Yii::t('global', 'Additional Address Bis 2'),
			'city_2' => Yii::t('global', 'City 2'),
			'country_2' => Yii::t('global', 'Country 2'),
			'zip_2' => Yii::t('global', 'Zip 2'),
			'po_box_2' => Yii::t('global', 'Po Box 2'),
			'zip_cedex_2' => Yii::t('global', 'Zip Cedex 2'),
			'city_cedex_2' => Yii::t('global', 'City Cedex 2'),
			'phone_1_address_2' => Yii::t('global', 'Phone 1 Address 2'),
			'phone_2_address_21' => Yii::t('global', 'Phone 2 Address 2'),
			'fax_1_address_2' => Yii::t('global', 'Fax 1 Address 2'),
			'fax_2_address_2' => Yii::t('global', 'Fax 2 Address 2'),
			'email_1' => Yii::t('global', 'Email 1'),
			'email_2' => Yii::t('global', 'Email 2'),
			'email_3' => Yii::t('global', 'Email 3'),
			'website' => Yii::t('global', 'Website'),
			'website_2' => Yii::t('global', 'Website 2'),
			'logo' => Yii::t('global', 'Logo'),
			'image' => Yii::t('global', 'Picture'),
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
        $criteria->with     = array('trainingCentersTypes.typeTraining');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('school_name',$this->school_name,true);
		$criteria->compare('school_name_2',$this->school_name_2,true);
		$criteria->compare('advertiser',$this->advertiser);
		$criteria->compare('type_of_training',$this->type_of_training);
		$criteria->compare('degree',$this->degree,true);
		$criteria->compare('description_1',$this->description_1,true);
		$criteria->compare('description_2',$this->description_2,true);
		$criteria->compare('address_1',$this->address_1,true);
		$criteria->compare('additional_address_1',$this->additional_address_1,true);
		$criteria->compare('additional_address_2',$this->additional_address_2,true);
		$criteria->compare('city_1',$this->city_1,true);
		$criteria->compare('country_1',$this->country_1);
		$criteria->compare('po_box_1',$this->po_box_1,true);
		$criteria->compare('po_box_zip_1',$this->po_box_zip_1,true);
		$criteria->compare('zip_cedex_1',$this->zip_cedex_1,true);
		$criteria->compare('city_cedex_1',$this->city_cedex_1,true);
		$criteria->compare('phone_1_address_1',$this->phone_1_address_1,true);
		$criteria->compare('phone_2_address_2',$this->phone_2_address_2,true);
		$criteria->compare('fax_address_1',$this->fax_address_1,true);
		$criteria->compare('fax_address_2',$this->fax_address_2,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('additional_address_bis_1',$this->additional_address_bis_1,true);
		$criteria->compare('additional_address_bis_2',$this->additional_address_bis_2,true);
		$criteria->compare('city_2',$this->city_2,true);
		$criteria->compare('country_2',$this->country_2);
		$criteria->compare('zip_2',$this->zip_2,true);
		$criteria->compare('po_box_2',$this->po_box_2,true);
		$criteria->compare('zip_cedex_2',$this->zip_cedex_2,true);
		$criteria->compare('city_cedex_2',$this->city_cedex_2,true);
		$criteria->compare('phone_1_address_2',$this->phone_1_address_2,true);
		$criteria->compare('phone_2_address_21',$this->phone_2_address_21,true);
		$criteria->compare('fax_1_address_2',$this->fax_1_address_2,true);
		$criteria->compare('fax_2_address_2',$this->fax_2_address_2,true);
		$criteria->compare('email_1',$this->email_1,true);
		$criteria->compare('email_2',$this->email_2,true);
		$criteria->compare('email_3',$this->email_3,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('website_2',$this->website_2,true);
		$criteria->compare('logo',$this->logo,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);
        $criteria->compare('typeTraining.id',$this->name_type_of_training, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'name_type_of_training'=>array(
                        'asc'=>'typeTraining.name',
                        'desc'=>'typeTraining.name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    function getStatusTrainingCenters( $status ){
        if($status==self::STATUS_YES)
            return Yii::t('global','Yes');
        return Yii::t('global','No');
    }

    function showAdminImage(){
        $image = ($this->image!='')?$this->image:'no_image.gif';
        return '<a class="fancybox" href="'.Yii::app()->params['homeUrl'].'/uploads/audios/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="'.Yii::app()->params['homeUrl'].'/uploads/audios/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function showAdminImageNew( $image ){
        $image = ($image!='')?$image:'no_image.gif';
        return '<a class="fancybox" href="'.Yii::app()->params['homeUrl'].'/uploads/audios/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="'.Yii::app()->params['homeUrl'].'/uploads/audios/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function getTrainingCenterType( $id ){
        $catProducts = TrainingCentersType::model()->findAllByAttributes(array('training_centers_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/categories/view/?id='.$catProduct['typeTraining']['id']).">".$catProduct['typeTraining']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    public function getCategoriesId(){
        if ($this->id){
            $models = TrainingCentersType::model()->findAllByAttributes(array('training_centers_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->type_training_id;

            return $arr;
        }
        return array();
    }

    function getListTrainingCenterType( $id ){
        $catEvent = TrainingCentersType::model()->findAllByAttributes(array('training_centers_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view/?id='.$catProduct['typeTraining']['id']).">".$catProduct['typeTraining']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    public function getIdTrainingCentersDegrees(){
        if ($this->id){
            $models = TrainingCentersDegrees::model()->findAllByAttributes(array('training_centers_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->degrees_id;

            return $arr;
        }
        return array();
    }

    function getListTrainingCenterDegrees( $id ){
        $catEvent = TrainingCentersDegrees::model()->findAllByAttributes(array('training_centers_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/degrees/view/?id='.$catProduct['degrees']['id']).">".$catProduct['degrees']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'school_name',
        ));
        foreach($models as $model){
            $arr[$model->id]['school_name'] = $model->school_name;
        }
    }

    public function getTrainingCenterNewsId(){
        if ($this->id){
            $models = TrainingCenterNews::model()->findAllByAttributes(array('training_center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->news_id;

            return $arr;
        }
        return array();
    }

    public function getTrainingCenterArticlesId(){
        if ($this->id){
            $models = TrainingCenterArticles::model()->findAllByAttributes(array('training_center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->product_id;

            return $arr;
        }
        return array();
    }

    public function getTrainingCenterHearingTvId(){
        if ($this->id){
            $models = TrainingCenterHearingTv::model()->findAllByAttributes(array('training_center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    public function getTrainingCenterEventsId(){
        if ($this->id){
            $models = TrainingCenterEvents::model()->findAllByAttributes(array('training_center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->event_id;

            return $arr;
        }
        return array();
    }

    public function getTrainingCenterSpeechTherapistId(){
        if ($this->id){
            $models = TrainingCenterSpeechTherapists::model()->findAllByAttributes(array('training_center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->speech_therapists_id;

            return $arr;
        }
        return array();
    }

    function getTrainingCenterNews( $id ){
        $catEvent = TrainingCenterNews::model()->findAllByAttributes(array('training_center_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view/?id='.$catProduct['news']['id']).">".$catProduct['news']['title']."</a></label>";
        }
        return $listCatProduct;
    }

    function getTrainingCenterArticles( $id ){
        $catEvent = TrainingCenterArticles::model()->findAllByAttributes(array('training_center_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view/?id='.$catProduct['product']['id']).">".$catProduct['product']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getTrainingCenterHearingTv( $id ){
        $catEvent = TrainingCenterHearingTv::model()->findAllByAttributes(array('training_center_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view/?id='.$catProduct['video']['id']).">".$catProduct['video']['title']."</a></label>";
        }
        return $listCatProduct;
    }

    function getTrainingCenterEvents( $id ){
        $catEvent = TrainingCenterEvents::model()->findAllByAttributes(array('training_center_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/events/view/?id='.$catProduct['event']['id']).">".$catProduct['event']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getTrainingCenterSpeechTherapist( $id ){
        $catEvent = TrainingCenterSpeechTherapists::model()->findAllByAttributes(array('training_center_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/speechTherapist/view/?id='.$catProduct['speechTherapists']['id']).">".$catProduct['speechTherapists']['name']."</a></label>";
        }
        return $listCatProduct;
    }

}