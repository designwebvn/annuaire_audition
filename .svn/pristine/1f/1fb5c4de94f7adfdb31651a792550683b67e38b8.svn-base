<?php

/**
 * This is the model class for table "news_categorys".
 *
 * The followings are the available columns in table 'news_categorys':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $alias
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property NewsCategorys $parent
 * @property NewsCategorys[] $newsCategorys
 */
class NewsCategorys extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsCategorys the static model class
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
		return 'news_categorys';
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
            array('name', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name, alias', 'length', 'max'=>255),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent_id, alias, created, updated', 'safe', 'on'=>'search'),
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
            'parent' => array(self::BELONGS_TO, 'NewsCategorys', 'parent_id'),
            'newsCategorys' => array(self::HAS_MANY, 'NewsCategorys', 'parent_id'),
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
			'parent_id' => Yii::t('global', 'Parent'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('alias',$this->alias,true);
        if ($this->created)
            $criteria->compare('t.created',date('Y-m-d ', strtotime($this->created)),true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=> 't.id DESC',
                'attributes'=>array(
                    'parent.name'=>array(
                        'asc'=>'parent_id',
                        'desc'=>'parent_id DESC',
                    ),
                    '*'),
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
            if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $this->id, ':alias' => $this->alias ) ) )			{
                $this->alias .= '-1';
                $this->CheckUniqueAlias();
            }
        }
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

    /**
     * after save method
     */
    public function afterSave()
    {
        Yii::app()->urlManager->clearCache();

        return parent::afterSave();
    }

    function getTree(&$arr, $parent_id = 0){
        $models=self::model()->findAll(array(
            'condition'=>'parent_id=:parent_id',
            'params'=>array(':parent_id'=>$parent_id),
            'order'=>'name',
        ));

        foreach($models as $model){
            $arr[$model->id]['name']=$model->name;
            $arr[$model->id]['alias']=$model->alias;
            self::getTree($arr[$model->id]['childs'], $model->id);
        }
    }

    public function getAllCategory(){
        $allCategory = self::model()->findAll(array('order'=>'name asc'));
        $category = array();
        foreach($allCategory as $item) {
            $category[$item['id']]=$item['name'];
        }
        return $category;
    }

    public function getParentCategory( $parent_id ){
        $name       = '';
        if( $parent_id != 0 ){
            $parentName = NewsCategorys::model()->findByPk( $parent_id );
            $name       = $parentName['name'];
        }
       return $name;
    }

    public function getNameCat($cate_id){
        $result = NewsCategorys::model()->find(array(
                    'select'=>'name',
                    'condition'=>'id=:id',
                    'params'=>array( ':id'=>$cate_id ) )
                );

        return  $result['name'];
    }

    public function getCatNewsByAlias($alias){
        return NewsCategorys::model()->findByAttributes(array('alias'=>$alias));
    }

}