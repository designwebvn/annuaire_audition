<?php

/**
 * This is the model class for table "product_categories".
 *
 * The followings are the available columns in table 'product_categories':
 * @property integer $id
 * @property integer $product_id
 * @property integer $category_id
 *
 * The followings are the available model relations:
 * @property Products $product
 * @property Categories $category
 */
class ProductCategories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductCategories the static model class
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
		return 'product_categories';
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
			array('product_id, category_id', 'required'),
			array('product_id, category_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, category_id', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'product_id' => Yii::t('global', 'Product'),
			'category_id' => Yii::t('global', 'Category'),
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('category_id',$this->category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function getProductOfCategory($arrayProduct,$idCategory){
        $sql = "SELECT * FROM product_categories
                WHERE product_id IN (".implode(',' , ($arrayProduct)? $arrayProduct: array(0)).") AND category_id=".$idCategory;
              
        $allCategory = Yii::app()->db->createCommand($sql)->queryAll();
        return count($allCategory);
        
    }
    
    public function GetListCategoryId( $alias ){
        $sql = "SELECT category_id 
                FROM products 
                INNER JOIN product_categories 
                ON products.id = product_categories.product_id 
                WHERE products.alias = '".$alias."'";
        return Yii::app()->db->createCommand($sql)->queryAll(); 
    }
    
}