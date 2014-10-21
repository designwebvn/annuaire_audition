<?php

/**
 * This is the model class for table "payments".
 *
 * The followings are the available columns in table 'payments':
 * @property integer $id
 * @property string $name
 * @property string $full_name
 * @property integer $card_number
 * @property string $cvv_code
 * @property string $expires_from
 * @property string $expires_to
 * @property integer $order_id
 */
class Payments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payments the static model class
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
		return 'payments';
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
			array('card_number, order_id', 'numerical', 'integerOnly'=>true),
			array('name, full_name', 'length', 'max'=>255),
			array('cvv_code', 'length', 'max'=>20),
			array('expires_from,expires_to', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, full_name, card_number, cvv_code, expires_from, expires_to, order_id', 'safe', 'on'=>'search'),
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
			'full_name' => Yii::t('global', 'Full Name'),
			'card_number' => Yii::t('global', 'Card Number'),
			'cvv_code' => Yii::t('global', 'Cvv Code'),
			'expires_from' => Yii::t('global', 'Expires From'),
			'expires_to' => Yii::t('global', 'Expires To'),
			'order_id' => Yii::t('global', 'Order'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('card_number',$this->card_number);
		$criteria->compare('cvv_code',$this->cvv_code,true);
		$criteria->compare('expires_from',$this->expires_from,true);
		$criteria->compare('expires_to',$this->expires_to,true);
		$criteria->compare('order_id',$this->order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}