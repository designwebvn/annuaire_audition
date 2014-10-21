<?php

/**
 * This is the model class for table "speech_therapist_agencies".
 *
 * The followings are the available columns in table 'speech_therapist_agencies':
 * @property integer $id
 * @property integer $speech_therapist_id
 * @property integer $agencies_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Agencies $agencies
 */
class SpeechTherapistAgencies extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpeechTherapistAgencies the static model class
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
		return 'speech_therapist_agencies';
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
			array('speech_therapist_id, agencies_id', 'required'),
			array('speech_therapist_id, agencies_id', 'numerical', 'integerOnly'=>true),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, speech_therapist_id, agencies_id, created, updated', 'safe', 'on'=>'search'),
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
			'agencies' => array(self::BELONGS_TO, 'Agencies', 'agencies_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'speech_therapist_id' => Yii::t('global', 'Speech Therapist'),
			'agencies_id' => Yii::t('global', 'Agencies'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('speech_therapist_id',$this->speech_therapist_id);
		$criteria->compare('agencies_id',$this->agencies_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}