<?php

/**
 * This is the model class for table "doctors".
 *
 * The followings are the available columns in table 'doctors':
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $first_name
 * @property integer $ent
 * @property integer $phoniatricians
 * @property string $free_field
 * @property string $degrees
 * @property integer $status_grade
 * @property string $specialty
 * @property integer $audiometry
 * @property string $audiometry_ff
 * @property integer $phoniatry
 * @property string $phoniatry_ff
 * @property integer $speech_therapy
 * @property string $speech_therapy_ff
 * @property string $specific_phone_number
 * @property string $specific_fax
 * @property string $created
 * @property string $updated
 * @property integer $department
 *
 * The followings are the available model relations:
 * @property DoctorAgencies[] $doctorAgencies
 * @property DoctorArticles[] $doctorArticles
 * @property DoctorDegrees[] $doctorDegrees
 * @property DoctorHearingTv[] $doctorHearingTvs
 * @property DoctorSpecialEducationSchools[] $doctorSpecialEducationSchools
 * @property Maps $department0
 * @property SpeechTherapist $speechTherapist
 * @property Services $services
 */
class Doctors extends CActiveRecord
{
    const STATUS_YES = 1;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Doctors the static model class
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
		return 'doctors';
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
			array('title, name, first_name, specialty, audiometry_ff, audiometry, phoniatry, phoniatry_ff, speech_therapy', 'required'),
            array('specific_phone_number, specific_fax', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
            array('ent, phoniatricians, audiometry, phoniatry, speech_therapy, department, status_grade', 'numerical', 'integerOnly'=>true),
			array('title, name, first_name,  specialty, free_field, audiometry_ff, phoniatry_ff, specific_phone_number, specific_fax, speech_therapy_ff', 'length', 'max'=>255),
			array('degrees, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, name, first_name, ent, phoniatricians, free_field, degrees, status_grade, specialty, audiometry, audiometry_ff, phoniatry, phoniatry_ff, speech_therapy, specific_phone_number, specific_fax, created, updated, department', 'safe', 'on'=>'search'),
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
			'department0' => array(self::BELONGS_TO, 'Maps', 'department'),
            'speechTherapist' => array(self::BELONGS_TO, 'SpeechTherapist', 'speech_therapy'),
            'services' => array(self::BELONGS_TO, 'Services', 'specialty'),
            'doctorAgencies' => array(self::HAS_MANY, 'DoctorAgencies', 'doctor_id'),
            'doctorArticles' => array(self::HAS_MANY, 'DoctorArticles', 'doctor_id'),
            'doctorDegrees' => array(self::HAS_MANY, 'DoctorDegrees', 'doctor_id'),
            'doctorHearingTvs' => array(self::HAS_MANY, 'DoctorHearingTv', 'doctor_id'),
            'doctorSpecialEducationSchools' => array(self::HAS_MANY, 'DoctorSpecialEducationSchools', 'doctor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'title' => Yii::t('global', 'Title'),
			'name' => Yii::t('global', 'Name'),
			'first_name' => Yii::t('global', 'First Name'),
			'ent' => Yii::t('global', 'Ent'),
			'phoniatricians' => Yii::t('global', 'Phoniatricians'),
			'free_field' => Yii::t('global', 'Free Field'),
			'degrees' => Yii::t('global', 'Degrees'),
			'status_grade' => Yii::t('global', 'Status Grade'),
			'specialty' => Yii::t('global', 'Specialty'),
			'audiometry' => Yii::t('global', 'Audiometry'),
			'audiometry_ff' => Yii::t('global', 'Audiometry Ff'),
			'phoniatry' => Yii::t('global', 'Phoniatry'),
			'phoniatry_ff' => Yii::t('global', 'Phoniatry Ff'),
			'speech_therapy' => Yii::t('global', 'Speech Therapy'),
            'speech_therapy_ff' => Yii::t('global', 'Speech Therapy Ff'),
			'specific_phone_number' => Yii::t('global', 'Specific Phone Number'),
			'specific_fax' => Yii::t('global', 'Specific Fax'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('ent',$this->ent);
		$criteria->compare('phoniatricians',$this->phoniatricians);
		$criteria->compare('free_field',$this->free_field,true);
		$criteria->compare('degrees',$this->degrees,true);
		$criteria->compare('status_grade',$this->status_grade);
        $criteria->compare('specialty',$this->specialty,true);
		$criteria->compare('audiometry',$this->audiometry);
		$criteria->compare('audiometry_ff',$this->audiometry_ff,true);
		$criteria->compare('phoniatry',$this->phoniatry);
		$criteria->compare('phoniatry_ff',$this->phoniatry_ff,true);
		$criteria->compare('speech_therapy',$this->speech_therapy);
        $criteria->compare('speech_therapy_ff',$this->speech_therapy_ff,true);
		$criteria->compare('specific_phone_number',$this->specific_phone_number,true);
		$criteria->compare('specific_fax',$this->specific_fax,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('department',$this->department);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
		));
	}

    public function getStatus( $status ){
        $name = Yii::t('global','No');
        if( $status == self::STATUS_YES )
            $name = Yii::t('global','Yes');
        return $name;
    }

    function getDoctorDegreesId(){
        if ($this->id){
            $models = DoctorDegrees::model()->findAllByAttributes(array('doctor_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->degree_id;

            return $arr;
        }
        return array();
    }

    function getDoctorDegrees($id){
        $catProducts = DoctorDegrees::model()->findAllByAttributes(array('doctor_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view/?id='.$catProduct['degree']['id']).">".$catProduct['degree']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getDoctorArticlesId(){
        if ($this->id){
            $models = DoctorArticles::model()->findAllByAttributes(array('doctor_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->product_id;

            return $arr;
        }
        return array();
    }

    function getDoctorArticles($id){
        $catProducts = DoctorArticles::model()->findAllByAttributes(array('doctor_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view/?id='.$catProduct['product']['id']).">".$catProduct['product']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getDoctorHearingTvId(){
        if ($this->id){
            $models = DoctorHearingTv::model()->findAllByAttributes(array('doctor_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    function getDoctorHearingTv($id){
        $catProducts = DoctorHearingTv::model()->findAllByAttributes(array('doctor_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view/?id='.$catProduct['video']['id']).">".$catProduct['video']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getDoctorSpecialEducationSchoolsId(){
        if ($this->id){
            $models = DoctorSpecialEducationSchools::model()->findAllByAttributes(array('doctor_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->special_education_schools_id;

            return $arr;
        }
        return array();
    }

    function getDoctorSpecialEducationSchools($id){
        $catProducts = DoctorSpecialEducationSchools::model()->findAllByAttributes(array('doctor_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/specialEducationSchools/view/?id='.$catProduct['specialEducationSchools']['id']).">".$catProduct['specialEducationSchools']['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getDoctorAgenciesId(){
        if ($this->id){
            $models = DoctorAgencies::model()->findAllByAttributes(array('doctor_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->agencies_id;

            return $arr;
        }
        return array();
    }

    function getDoctorAgencies($id){
        $catProducts = DoctorAgencies::model()->findAllByAttributes(array('doctor_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/agencies/view/?id='.$catProduct['agencies']['id']).">".$catProduct['agencies']['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }


}