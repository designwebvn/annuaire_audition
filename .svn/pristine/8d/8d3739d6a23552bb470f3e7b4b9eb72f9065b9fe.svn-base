<?php

/**
 * This is the model class for table "supplier_products_comments".
 *
 * The followings are the available columns in table 'supplier_products_comments':
 * @property integer $id
 * @property integer $product_id
 * @property integer $parent_id
 * @property string $subject
 * @property string $author
 * @property string $content
 * @property integer $is_active
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property SupplierProductsComments $parent
 * @property SupplierProductsComments[] $SupplierProductsComments
 * @property SupplierProducts $product
 */
class SupplierProductsComments extends CActiveRecord
{
    const STATUS_ACTIVE                 = 1;
    public $new_title;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SupplierProductsComments the static model class
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
		return 'supplier_products_comments';
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
			array('subject, author', 'required'),
			array('product_id, parent_id, is_active', 'numerical', 'integerOnly'=>true),
			array('subject, author', 'length', 'max'=>255),
			array('content, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, parent_id, subject, author, content, is_active, created, updated, new_title', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'SupplierProducts', 'product_id'),
            'parent' => array(self::BELONGS_TO, 'SupplierProductsComments', 'parent_id'),
            'SupplierProductsComments' => array(self::HAS_MANY, 'SupplierProductsComments', 'parent_id'),
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
			'parent_id' => Yii::t('global', 'Parent'),
			'subject' => Yii::t('global', 'Subject'),
			'author' => Yii::t('global', 'Author'),
			'content' => Yii::t('global', 'Content'),
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
        $criteria->together = true;
        $criteria->with = array('product');

		$criteria->compare('id',$this->id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('is_active',$this->is_active);
        $criteria->compare('product.name',$this->new_title, true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'new_title'=>array(
                        'asc'=>'product.name',
                        'desc'=>'product.name DESC',
                    ),
                    'parent.subject'=>array(
                        'asc'=>'parent_id',
                        'desc'=>'parent_id DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    function getActiveComments(){
        $active_news = array(
            Yii::t('global','Disable'),
            Yii::t('global','Enable')
        );
        return $active_news;
    }

    function getStatusComments($status){
        if($status==self::STATUS_ACTIVE)
            return Yii::t('global','Enable');
        return Yii::t('global','Disable');
    }

    function getTitleProduct( $id ){
        $catNews    = SupplierProducts::model()->findByPk( $id );
        $titleNews = "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/supplierProducts/view/?id='.$catNews['id']).">".$catNews['name']."</a></label>";
        return $titleNews;
    }

    public function getParentCategory( $parent_id ){
        $name       = '';
        if( $parent_id != 0 ){
            $parentName = SupplierProductsComments::model()->findByPk( $parent_id );
            $name       = $parentName['subject'];
        }
        return $name;
    }

}