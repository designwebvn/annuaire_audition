<?php

/**
 * This is the model class for table "supplier_products_file".
 *
 * The followings are the available columns in table 'supplier_products_file':
 * @property integer $id
 * @property integer $product_supplier_id
 * @property string $list_file
 * @property integer $type
 * @property string $created
 * @property string $updated
 */
class SupplierProductsFile extends CActiveRecord
{

    const TYPE_PDF = 1;
    const TYPE_IMG = 0;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SupplierProductsFile the static model class
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
		return 'supplier_products_file';
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
			array('product_supplier_id, type', 'numerical', 'integerOnly'=>true),
			array('list_file', 'length', 'max'=>255),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_supplier_id, list_file, type, created, updated', 'safe', 'on'=>'search'),
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
			'product_supplier_id' => Yii::t('global', 'Product Supplier'),
			'list_file' => Yii::t('global', 'List File'),
			'type' => Yii::t('global', 'Type'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search( $id, $type = 0 )
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('product_supplier_id',$id);
		$criteria->compare('list_file',$this->list_file,true);
		$criteria->compare('type',$type);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
		));
	}

    function showAdminImage(){
        $image = ($this->list_file != '')?$this->list_file:'no_image.gif';
        return '<a class="fancybox" href="'.Yii::app()->params['homeUrl'].'/uploads/supplier_products/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="'.Yii::app()->params['homeUrl'].'/uploads/supplier_products/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function showAdminPdf( $pdf ){
        return '<a href="'.Yii::app()->params['homeUrl'].'/uploads/supplier_products/pdf/'.$pdf.'" rel="group">'.$pdf.'</a>';
    }

}