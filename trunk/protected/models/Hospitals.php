<?php

/**
 * This is the model class for table "hospitals".
 *
 * The followings are the available columns in table 'hospitals':
 * @property integer $id
 * @property string $corporate_name
 * @property string $corporate_name_2
 * @property string $description
 * @property string $link
 * @property string $address
 * @property string $additional_address
 * @property string $po_box
 * @property string $cedex
 * @property string $city_cedex
 * @property string $zip
 * @property string $city
 * @property integer $country
 * @property string $website
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property integer $center_for_laryngectomy
 * @property string $created
 * @property string $updated
 * @property integer $department
 *
 * The followings are the available model relations:
 * @property HospitalServices[] $hospitalServices
 * @property Maps $department0
 * @property HospitalCenters[] $hospitalCenters
 * @property HospitalSpeechTherapist[] $hospitalSpeechTherapists
 */
class Hospitals extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Hospitals the static model class
	 */
    public $type_service;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hospitals';
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
			array('corporate_name, address, zip, city, country', 'required'),
            array('email','email'),
            array('phone, fax', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
            array('website, link', 'url', 'defaultScheme' => 'http'),
			array('country, center_for_laryngectomy, department', 'numerical', 'integerOnly'=>true),
			array('corporate_name, corporate_name_2, description, link, address, additional_address', 'length', 'max'=>255),
			array('po_box, cedex, city_cedex, zip, city, website, phone, fax, email', 'length', 'max'=>150),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, corporate_name, corporate_name_2, description, link, address, additional_address, po_box, cedex, city_cedex, zip, city, country, website, phone, fax, email, center_for_laryngectomy, created, updated, department, type_service', 'safe', 'on'=>'search'),
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
            'hospitalServices' => array(self::HAS_MANY, 'HospitalServices', 'hospitals_id'),
            'department0' => array(self::BELONGS_TO, 'Maps', 'department'),
            'hospitalCenters' => array(self::HAS_MANY,'HospitalCenters', 'hospital_id'),
            'hospitalSpeechTherapists' => array(self::HAS_MANY, 'HospitalSpeechTherapist', 'hospital_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'corporate_name' => Yii::t('global', 'Corporate Name'),
			'corporate_name_2' => Yii::t('global', 'Corporate Name 2'),
			'description' => Yii::t('global', 'Description'),
			'link' => Yii::t('global', 'Link'),
			'address' => Yii::t('global', 'Address'),
			'additional_address' => Yii::t('global', 'Additional Address'),
			'po_box' => Yii::t('global', 'Po Box'),
			'cedex' => Yii::t('global', 'Cedex'),
			'city_cedex' => Yii::t('global', 'City Cedex'),
			'zip' => Yii::t('global', 'Zip'),
			'city' => Yii::t('global', 'City'),
			'country' => Yii::t('global', 'Country'),
			'website' => Yii::t('global', 'Website'),
			'phone' => Yii::t('global', 'Phone'),
			'fax' => Yii::t('global', 'Fax'),
			'email' => Yii::t('global', 'Email'),
			'center_for_laryngectomy' => Yii::t('global', 'Center For Laryngectomy'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
            'department' => Yii::t('global', 'Department'),
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
        $criteria->with = array('hospitalServices.services');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('corporate_name',$this->corporate_name,true);
		$criteria->compare('corporate_name_2',$this->corporate_name_2,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('additional_address',$this->additional_address,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('cedex',$this->cedex,true);
		$criteria->compare('city_cedex',$this->city_cedex,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('center_for_laryngectomy',$this->center_for_laryngectomy);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);
        $criteria->compare('department',$this->department);
        $criteria->compare('services.id',$this->type_service);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
		));
	}

    public function getCategoriesId(){
        if ($this->id){
            $models = HospitalServices::model()->findAllByAttributes(array('hospitals_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->services_id;

            return $arr;
        }
        return array();
    }

    function getHospitalService($id){
        $catProducts = HospitalServices::model()->findAllByAttributes(array('hospitals_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/services/view/?id='.$catProduct['services']['id']).">".$catProduct['services']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    public function getHospitalCentersId(){
        if ($this->id){
            $models = HospitalCenters::model()->findAllByAttributes(array('hospital_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->centers_id;

            return $arr;
        }
        return array();
    }

    function getHospitalCenters($id){
        $catProducts = HospitalCenters::model()->findAllByAttributes(array('hospital_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view/?id='.$catProduct['centers']['id']).">".$catProduct['centers']['corporate_name']."</a></label>";
        }
        return $listCatProduct;
    }

    public function getHospitalSpeechTherapistId(){
        if ($this->id){
            $models = HospitalSpeechTherapist::model()->findAllByAttributes(array('hospital_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->speech_therapist_id;

            return $arr;
        }
        return array();
    }

    function getHospitalSpeechTherapist($id){
        $catProducts = HospitalSpeechTherapist::model()->findAllByAttributes(array('hospital_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/speechTherapist/view/?id='.$catProduct['speechTherapist']['id']).">".$catProduct['speechTherapist']['name']."</a></label>";
        }
        return $listCatProduct;
    }


}