<?php

/**
 * This is the model class for table "training_center_events".
 *
 * The followings are the available columns in table 'training_center_events':
 * @property integer $id
 * @property integer $training_center_id
 * @property integer $event_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Events $event
 */
class TrainingCenterEvents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrainingCenterEvents the static model class
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
		return 'training_center_events';
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
			array('training_center_id, event_id', 'required'),
			array('training_center_id, event_id', 'numerical', 'integerOnly'=>true),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, training_center_id, event_id, created, updated', 'safe', 'on'=>'search'),
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
			'event' => array(self::BELONGS_TO, 'Events', 'event_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'training_center_id' => Yii::t('global', 'Training Center'),
			'event_id' => Yii::t('global', 'Event'),
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
		$criteria->compare('training_center_id',$this->training_center_id);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}