<?php

/**
 * This is the model class for table "groups".
 *
 * The followings are the available columns in table 'groups':
 * @property integer $id
 * @property integer $product_id
 * @property string $group_name
 * @property string $description
 * @property string $alias
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property ProductPackage[] $productPackages
 */
class Groups extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Groups the static model class
	 */
    public $product_name;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'groups';
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
			array('product_id, group_name', 'required'),
			array('product_id', 'numerical', 'integerOnly'=>true),
			array('group_name, alias', 'length', 'max'=>255),
			array('description, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, group_name, description, alias, created, updated', 'safe', 'on'=>'search'),
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
			'productPackages' => array(self::HAS_MANY, 'ProductPackage', 'group_id'),
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
			'group_name' => Yii::t('global', 'Group Name'),
			'description' => Yii::t('global', 'Description'),
			'alias' => Yii::t('global', 'Alias'),
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('group_name',$this->group_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'product_name'=>array(
                        'asc'=>'product.name',
                        'desc'=>'product.name DESC',
                    ),
                    '*',
                ),
            ),
        ));
	}

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'group_name',
            'limit'=>7,//limit menu display
        ));
        foreach($models as $model){
            $arr[$model->id]['group_name']  = $model->group_name;
            $arr[$model->id]['alias']       = $model->alias;
            //self::getTree($arr[$model->id]['childs']);
        }
    }

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
            if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $this->id, ':alias' => $this->alias ) ) )			{
                $this->alias .= '-1';
                $this->CheckUniqueAlias();
            }
        }
    }

    public function beforeSave()
    {
        $this->alias = strtolower(str_replace(' ', '-', $this->group_name));
        $this->alias = strtolower(str_replace(array('+', '&'), '', $this->alias));

        return parent::beforeSave();
    }

    public function getAllGroup(){
        $allGroup   = self::model()->findAll();
        $group      = array();
        foreach($allGroup as $item) {
            $group[$item['id']] =    $item['group_name'];
        }
        return $group;
    }

    public function saveGroup($groups, $product_id){
        foreach($groups as $group){
            $model = new Groups();
            $model->group_name = $group['nameGroup'];
            $model->description = $group['desGroup'];
            $model->product_id = $product_id;
            if($model->save()){
                if(isset($group['Package'])){
                    $packages = $group['Package'];
                    ProductPackage::model()->savePackage($packages,$model->id);
                }

            }
        }
    }
    public function updateGroup($groups, $product_id){
        $Allgroup = Groups::model()->findAllByAttributes(array('product_id'=>$product_id));
        foreach($Allgroup as $item ){

            if (array_key_exists($item->id, $groups)) {
                $model = Groups::model()->findByPk($item->id);
                $model->group_name = $groups[$item->id]['nameGroup'];
                $model->description = $groups[$item->id]['desGroup'];
                $model->save();
                $packages = $groups[$item->id]['Package'];
                ProductPackage::model()->updatePackage($packages,$item->id);
                unset($groups[$item->id]);
            } else {
                $sql = "DELETE FROM product_package WHERE group_id=".$item->id;
                Yii::app()->db->createCommand($sql)->query();
                Groups::model()->findByPk($item->id)->delete();
            }
        }
        if(is_array($groups) && count($groups) >0 ){
            self::saveGroup($groups,$product_id);
        }
    }
}