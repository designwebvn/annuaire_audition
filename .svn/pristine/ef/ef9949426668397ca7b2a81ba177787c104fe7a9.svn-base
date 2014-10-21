<?php

/**
 * This is the model class for table "shippings".
 *
 * The followings are the available columns in table 'shippings':
 * @property integer $id
 * @property integer $country_id
 * @property integer $type_shipping
 * @property integer $type_price
 * @property integer $affiliate_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Countries $country
 * @property TypeShippings $typeShip
 */
class Shippings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Shippings the static model class
	 */
    public $short_name, $type_name;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shippings';
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
			array('type_price', 'required'),
			array('country_id, type_shipping, type_price, affiliate_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, country_id, type_shipping, type_price, affiliate_id, created, updated', 'safe', 'on'=>'search'),
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
            'country' => array(self::BELONGS_TO, 'Countries', 'country_id'),
            'typeShip' => array(self::BELONGS_TO, 'TypeShippings', 'type_shipping'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'country_id' => Yii::t('global', 'Country'),
			'type_shipping' => Yii::t('global', 'Type Shipping'),
			'type_price' => Yii::t('global', 'Type Price'),
            'affiliate_id' => Yii::t('global', 'Affiliate'),
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
        $criteria->with = array('country','typeShip');

		$criteria->compare('id',$this->id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('type_shipping',$this->type_shipping);
		$criteria->compare('type_price',$this->type_price);
        $criteria->compare('country.short_name',$this->short_name);
        $criteria->compare('typeShip.name',$this->type_name);
        $criteria->compare('affiliate_id',$this->affiliate_id);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'short_name'=>array(
                        'asc'=>'country.short_name',
                        'desc'=>'country.short_name DESC',
                    ),
                    'type_name'=>array(
                        'asc'=>'typeShip.name',
                        'desc'=>'typeShip.name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}
}