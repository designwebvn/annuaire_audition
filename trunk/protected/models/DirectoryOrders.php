<?php

/**
 * This is the model class for table "directory_orders".
 *
 * The followings are the available columns in table 'directory_orders':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property integer $country
 * @property integer $is_receive
 * @property integer $quanlity
 * @property integer $prices
 * @property integer $total
 * @property integer $check_number
 * @property string $value_check_number
 * @property integer $international_mandate
 * @property string $value_international_mandate
 * @property integer $transfer_to_ocep_edition
 * @property string $address_annuaire
 * @property integer $is_active
 * @property string $created
 * @property string $updated
 */
class DirectoryOrders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DirectoryOrders the static model class
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
		return 'directory_orders';
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
			array('name, address, city, zip, country, is_receive, quanlity, prices, total', 'required'),
			array('country, is_receive, quanlity, prices, total, check_number, international_mandate, transfer_to_ocep_edition, is_active', 'numerical', 'integerOnly'=>true),
			array('name, address, city, zip, value_check_number, value_international_mandate, address_annuaire', 'length', 'max'=>255),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, city, zip, country, is_receive, quanlity, prices, total, check_number, value_check_number, international_mandate, value_international_mandate, transfer_to_ocep_edition, address_annuaire, is_active, created, updated', 'safe', 'on'=>'search'),
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
			'address' => Yii::t('global', 'Address'),
			'city' => Yii::t('global', 'City'),
			'zip' => Yii::t('global', 'Zip'),
			'country' => Yii::t('global', 'Country'),
			'is_receive' => Yii::t('global', 'Is Receive'),
			'quanlity' => Yii::t('global', 'Quanlity'),
			'prices' => Yii::t('global', 'Prices'),
			'total' => Yii::t('global', 'Total'),
			'check_number' => Yii::t('global', 'Check Number'),
			'value_check_number' => Yii::t('global', 'Value Check Number'),
			'international_mandate' => Yii::t('global', 'International Mandate'),
			'value_international_mandate' => Yii::t('global', 'Value International Mandate'),
			'transfer_to_ocep_edition' => Yii::t('global', 'Transfer To Ocep Edition'),
			'address_annuaire' => Yii::t('global', 'Address Annuaire'),
			'is_active' => Yii::t('global', 'Is Active'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('is_receive',$this->is_receive);
		$criteria->compare('quanlity',$this->quanlity);
		$criteria->compare('prices',$this->prices);
		$criteria->compare('total',$this->total);
		$criteria->compare('check_number',$this->check_number);
		$criteria->compare('value_check_number',$this->value_check_number,true);
		$criteria->compare('international_mandate',$this->international_mandate);
		$criteria->compare('value_international_mandate',$this->value_international_mandate,true);
		$criteria->compare('transfer_to_ocep_edition',$this->transfer_to_ocep_edition);
		$criteria->compare('address_annuaire',$this->address_annuaire,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}