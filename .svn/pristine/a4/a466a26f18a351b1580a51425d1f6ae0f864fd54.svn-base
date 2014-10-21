<?php

/**
 * This is the model class for table "speech_therapist_practices".
 *
 * The followings are the available columns in table 'speech_therapist_practices':
 * @property integer $id
 * @property integer $speech_therapist_id
 * @property integer $practices_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property SpeechTherapist $speechTherapist
 * @property Practices $practices
 */
class SpeechTherapistPractices extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpeechTherapistPractices the static model class
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
		return 'speech_therapist_practices';
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
			array('speech_therapist_id, practices_id', 'numerical', 'integerOnly'=>true),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, speech_therapist_id, practices_id, created, updated', 'safe', 'on'=>'search'),
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
			'speechTherapist' => array(self::BELONGS_TO, 'SpeechTherapist', 'speech_therapist_id'),
            'practices' => array(self::BELONGS_TO, 'Practices', 'practices_id'),
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
			'practices_id' => Yii::t('global', 'Practices'),
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
		$criteria->compare('practices_id',$this->practices_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}