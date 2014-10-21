<?php

/**
 * This is the model class for table "languages".
 *
 * The followings are the available columns in table 'languages':
 * @property integer $id
 * @property string $name
 * @property string $region_code
 * @property integer $currency_id
 * @property string $icon
 * @property string $ISO_country_code
 */
class Languages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Languages the static model class
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
		return 'languages';
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
			array('name,ISO_country_code, currency_id', 'required'),
			array('name', 'length', 'max'=>50),
			array('region_code', 'length', 'max'=>10),
			array('icon', 'length', 'max'=>255),
			array('ISO_country_code', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, region_code, currency_id, icon, ISO_country_code', 'safe', 'on'=>'search'),
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
            'currency' => array(self::BELONGS_TO, 'Currency', 'currency_id'),
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
			'region_code' => Yii::t('global', 'Region Code'),
			'currency_id' => Yii::t('global', 'Currency'),
			'icon' => Yii::t('global', 'Icon'),
			'ISO_country_code' => Yii::t('global', 'Iso Country Code'),
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
		$criteria->compare('region_code',$this->region_code,true);
		$criteria->compare('currency_id',$this->currency_id,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('ISO_country_code',$this->ISO_country_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getImages($icon){
        if($icon){
            $images = "<img src='/uploads/flag/".$icon."' />";
            return $images;
        }
    }
}