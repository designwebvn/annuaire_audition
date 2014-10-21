<?php

/**
 * This is the model class for table "product_package".
 *
 * The followings are the available columns in table 'product_package':
 * @property integer $id
 * @property integer $group_id
 * @property integer $quantity
 * @property string $quantity_type
 * @property double $price
 * @property integer $offers
 * @property string $shipping_type
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Group $group
 */
class ProductPackage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductPackage the static model class
	 */
    public $group_name;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_package';
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
			array('group_id', 'required'),
			array('group_id, quantity', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('quantity_type', 'length', 'max'=>100),
			array('shipping_type', 'length', 'max'=>255),
			array('offers, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group_id, quantity, quantity_type, price, offers, shipping_type, created, updated, group_name', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'Groups', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'group_id' => Yii::t('global', 'Group'),
			'quantity' => Yii::t('global', 'Quantity'),
			'quantity_type' => Yii::t('global', 'Quantity Type'),
			'price' => Yii::t('global', 'Price'),
			'offers' => Yii::t('global', 'Offers'),
			'shipping_type' => Yii::t('global', 'Shipping Type'),
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
        $criteria->with     = array('group');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('quantity_type',$this->quantity_type,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('offers',$this->offers,true);
        $criteria->compare('group.group_name', $this->group_name );
		$criteria->compare('shipping_type',$this->shipping_type,true);
        if ($this->created)
            $criteria->compare('DATE(t.created)', date('Y-m-d', strtotime($this->created)));
        if ($this->updated)
            $criteria->compare('DATE(t.updated)', date('Y-m-d', strtotime($this->updated)));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
             'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'group_name'=>array(
                        'asc'=>'group.group_name',
                        'desc'=>'group.group_name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    public function checkPackageSize($group,$size){
        $sql = "SELECT * FROM product_package WHERE group_id = {$group} AND quantity > {$size} LIMIT 1";
        $packageSize = ProductPackage::model()->findBySql($sql);
        return $packageSize;
    }

    public function savePackage($packages, $group_id){
        foreach($packages as $package){
            $model =  new ProductPackage();
            $model->group_id = $group_id;
            $model->quantity = $package['quantity'];
            $model->quantity_type = $package['quantity_type'];
            $model->price = $package['price'];
            $model->offers = $package['offers'];
            $model->shipping_type = $package['shipping_type'];
            $model->save();
        }
    }

    public function updatePackage($packages, $group_id){
        $allPackage =  ProductPackage::model()->findAllByAttributes(array('group_id'=>$group_id));
        foreach($allPackage as $item){
            if (array_key_exists($item->id, $packages)) {
                $model = ProductPackage::model()->findByPk($item->id);
                $model->quantity = $packages[$item->id]['quantity'];
                $model->quantity_type = $packages[$item->id]['quantity_type'];
                $model->price = $packages[$item->id]['price'];
                $model->offers = $packages[$item->id]['offers'];
                $model->shipping_type = $packages[$item->id]['shipping_type'];
                $model->save();
                unset($packages[$item->id]);
            } else {
                ProductPackage::model()->findByPk($item->id)->delete();
            }
        }
        if(is_array($packages) && count($packages) >0 ){
            self::savePackage($packages,$group_id);
        }
    }
}