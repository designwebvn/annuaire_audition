<?php

/**
 * This is the model class for table "supplier_products".
 *
 * The followings are the available columns in table 'supplier_products':
 * @property integer $id
 * @property string $name
 * @property integer $supplier_id
 * @property integer $is_activity
 * @property integer $is_brand
 * @property string $Reference
 * @property string $description
 * @property integer $is_new_product
 * @property integer $is_best_sale
 * @property integer $is_promotion
 * @property integer $is_highlighted
 * @property integer $is_disable_hightlight
 * @property string $link_hearingtv
 * @property string $alias
 * @property integer $chip_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations
 * @property Suppliers $supplier
 * @property SupplierProductsComments[] $supplierProductsComments
 * @property Chips $chip
 * @property SupplierProductsChip[] $supplierProductsChips
 * @property SupplierProductsHearingTv[] $supplierProductsHearingTvs
 * @property SupplierProductsArticles[] $supplierProductsArticles
 * @property SupplierProductsCenters[] $supplierProductsCenters
 */
class SupplierProducts extends CActiveRecord
{
	const STATUS_YES = 1;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SupplierProducts the static model class
	 */
    public $name_supplier;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supplier_products';
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
			array('name, supplier_id, is_activity, is_brand', 'required'),
            array('link_hearingtv', 'url', 'defaultScheme' => 'http'),
			array('supplier_id, is_activity, is_brand, is_new_product, is_best_sale, is_promotion, is_highlighted, is_disable_hightlight, chip_id', 'numerical', 'integerOnly'=>true),
			array('name, Reference, link_hearingtv, alias', 'length', 'max'=>255),
			array('description, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, supplier_id, is_activity, is_brand, Reference, description, is_new_product, is_best_sale, is_promotion, is_highlighted, is_disable_hightlight, link_hearingtv, alias, chip_id, created, updated, name_supplier', 'safe', 'on'=>'search'),
            array('alias', 'CheckUniqueAlias'),
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
            'supplier' => array(self::BELONGS_TO, 'Suppliers', 'supplier_id'),
			'supplierProductsComments' => array(self::HAS_MANY, 'SupplierProductsComments', 'product_id'),
            'chip' => array( self::BELONGS_TO, 'Chips', 'chip_id' ),
            'supplierProductsChips' => array(self::HAS_MANY,'SupplierProductsChip', 'supplier_products_id'),
            'supplierProductsHearingTvs' => array(self::HAS_MANY,'SupplierProductsHearingTv', 'supplier_products_id'),
            'supplierProductsArticles' => array(self::HAS_MANY,'SupplierProductsArticles', 'supplier_products_id'),
            'supplierProductsCenters' => array(self::HAS_MANY, 'SupplierProductsCenters', 'supplier_products_id'),
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
			'supplier_id' => Yii::t('global', 'Supplier'),
			'is_activity' => Yii::t('global', 'Activity'),
			'is_brand' => Yii::t('global', 'Brand'),
			'Reference' => Yii::t('global', 'Reference'),
			'description' => Yii::t('global', 'Description'),
			'is_new_product' => Yii::t('global', 'Is New Product'),
			'is_best_sale' => Yii::t('global', 'Is Best Sale'),
			'is_promotion' => Yii::t('global', 'Is Promotion'),
			'is_highlighted' => Yii::t('global', 'Is Highlighted'),
			'is_disable_hightlight' => Yii::t('global', 'Is Disable Hightlight'),
			'link_hearingtv' => Yii::t('global', 'Link Hearingtv'),
			'alias' => Yii::t('global', 'Alias'),
            'chip_id' => Yii::t('global', 'Chip'),
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
       /* $criteria->with     = array('supplier','chip');*/
        $criteria->with     = array('supplier');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('is_activity',$this->is_activity);
		$criteria->compare('is_brand',$this->is_brand);
		$criteria->compare('Reference',$this->Reference,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('is_new_product',$this->is_new_product);
		$criteria->compare('is_best_sale',$this->is_best_sale);
		$criteria->compare('is_promotion',$this->is_promotion);
		$criteria->compare('is_highlighted',$this->is_highlighted);
		$criteria->compare('is_disable_hightlight',$this->is_disable_hightlight);
		$criteria->compare('link_hearingtv',$this->link_hearingtv,true);
		$criteria->compare('alias',$this->alias,true);
        $criteria->compare('supplier.corporate_name', $this->name_supplier,true);
        $criteria->compare('chip_id',$this->chip_id);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'name_supplier'=>array(
                        'asc'=>'supplier.corporate_name',
                        'desc'=>'supplier.corporate_name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    /**
     * Check alias and language combination
     */
    public function CheckUniqueAlias()
    {
        if( $this->isNewRecord )
        {
            // Check if we already have an alias with those parameters
            if( self::model()->exists('alias=:alias', array(':alias' => $this->alias) ) ){
                $this->alias .= '-1';
                $this->CheckUniqueAlias();
            }
        }
        else
        {
            // Check if we already have an alias with those parameters
            if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $this->id, ':alias' => $this->alias ) ) )         {
                $this->alias .= '-1'.$this->id;;
                $this->CheckUniqueAlias();
            }
        }
    }

    public function CheckUniqueAliasNew( $id ,$alias )
    {
        // Check if we already have an alias with those parameters
        if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $id, ':alias' => $alias ) ) )         {
            $alias .= '-'.$id;
        }
        return $alias;
    }

    public function getAliasLabels(  ){
        $this->alias = strtolower(str_replace(' ', '-', $this->name));
        $this->alias = strtolower(str_replace('~[^-\w]+~', '', $this->alias));
        $this->alias = preg_replace('/[^A-Za-z0-9_\-]/', '', $this->alias);
        $this->alias = strtolower(str_replace("'", '', $this->alias));
        $this->alias = $this->CheckUniqueAliasNew( $this->id, $this->alias );
        Yii::app()->db->createCommand()
            ->update( 'products',
                array( 'alias' => $this->alias ),
                'id =:id',
                array( ':id'=> $this->id )
            );
    }

    /**
     * Before save operations
     */
    public function beforeSave()
    {
        $this->alias = strtolower(str_replace(' ', '-', $this->name));
        $this->alias = strtolower(str_replace(array('+', '&'), '', $this->alias));

        return parent::beforeSave();
    }

    public function getStatus( $type ){
        $name = Yii::t('global','No');
        if( $type == self::STATUS_YES )
            $name = Yii::t('global','Yes');
        return $name;
    }

    public function getUrlChip( $id, $name ){
        echo "<a href='/admin/chips/view?id=".$id."'>".$name;
    }

    public function getIdSupplierProductsChip(){
        if ($this->id){
            $models = SupplierProductsChip::model()->findAllByAttributes(array('supplier_products_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->chip_id;

            return $arr;
        }
        return array();
    }

    function getSupplierProductsChip($id){
        $catProducts = SupplierProductsChip::model()->findAllByAttributes(array('supplier_products_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/chips/view/?id='.$catProduct['chip']['id']).">".$catProduct['chip']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    public function getIdSupplierProductsVideo(){
        if ($this->id){
            $models = SupplierProductsHearingTv::model()->findAllByAttributes(array('supplier_products_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    public function getIdSupplierProductsArticles(){
        if ($this->id){
            $models = SupplierProductsArticles::model()->findAllByAttributes(array('supplier_products_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->articles_id;

            return $arr;
        }
        return array();
    }

    public function getIdSupplierProductsCenters(){
        if ($this->id){
            $models = SupplierProductsCenters::model()->findAllByAttributes(array('supplier_products_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->centers_id;

            return $arr;
        }
        return array();
    }

    function getSupplierProductsVideo($id){
        $catProducts = SupplierProductsHearingTv::model()->findAllByAttributes(array('supplier_products_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view/?id='.$catProduct['video']['id']).">".$catProduct['video']['title']."</a></label>";
        }
        return $listCatProduct;
    }

    function getSupplierProductsArticles($id){
        $catProducts = SupplierProductsArticles::model()->findAllByAttributes(array('supplier_products_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view/?id='.$catProduct['articles']['id']).">".$catProduct['articles']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getSupplierProductsCenters($id){
        $catProducts = SupplierProductsCenters::model()->findAllByAttributes(array('supplier_products_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view/?id='.$catProduct['centers']['id']).">".$catProduct['centers']['corporate_name']."</a></label>";
        }
        return $listCatProduct;
    }
}