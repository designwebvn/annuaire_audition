<?php

/**
 * This is the model class for table "supplier_products_centers".
 *
 * The followings are the available columns in table 'supplier_products_centers':
 * @property integer $id
 * @property integer $supplier_products_id
 * @property integer $centers_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Centers $centers
 */
class SupplierProductsCenters extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SupplierProductsCenters the static model class
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
		return 'supplier_products_centers';
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
			array('supplier_products_id, centers_id', 'required'),
			array('supplier_products_id, centers_id', 'numerical', 'integerOnly'=>true),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, supplier_products_id, centers_id, created, updated', 'safe', 'on'=>'search'),
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
			'centers' => array(self::BELONGS_TO, 'Centers', 'centers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'supplier_products_id' => Yii::t('global', 'Supplier Products'),
			'centers_id' => Yii::t('global', 'Centers'),
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
		$criteria->compare('supplier_products_id',$this->supplier_products_id);
		$criteria->compare('centers_id',$this->centers_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}