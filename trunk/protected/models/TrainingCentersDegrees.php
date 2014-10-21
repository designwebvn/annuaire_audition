<?php

/**
 * This is the model class for table "training_centers_degrees".
 *
 * The followings are the available columns in table 'training_centers_degrees':
 * @property integer $id
 * @property integer $training_centers_id
 * @property integer $degrees_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Degrees $degrees
 */
class TrainingCentersDegrees extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrainingCentersDegrees the static model class
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
		return 'training_centers_degrees';
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
			array('training_centers_id, degrees_id', 'required'),
			array('training_centers_id, degrees_id', 'numerical', 'integerOnly'=>true),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, training_centers_id, degrees_id, created, updated', 'safe', 'on'=>'search'),
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
			'degrees' => array(self::BELONGS_TO, 'Degrees', 'degrees_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'training_centers_id' => Yii::t('global', 'Training Centers'),
			'degrees_id' => Yii::t('global', 'Degrees'),
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
		$criteria->compare('training_centers_id',$this->training_centers_id);
		$criteria->compare('degrees_id',$this->degrees_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}