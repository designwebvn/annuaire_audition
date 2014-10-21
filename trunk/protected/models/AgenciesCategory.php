<?php

/**
 * This is the model class for table "agencies_category".
 *
 * The followings are the available columns in table 'agencies_category':
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $alias
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Agencies[] $agencies
 */
class AgenciesCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AgenciesCategory the static model class
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
		return 'agencies_category';
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
            array('alias', 'CheckUniqueAlias'),
            array('alias', 'match', 'allowEmpty'=>false, 'pattern'=>'/^[A-Za-z0-9_-]+$/'),
			array('name, type, alias', 'length', 'max'=>255),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, alias, created, updated', 'safe', 'on'=>'search'),
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
			'agencies' => array(self::HAS_MANY, 'Agencies', 'type'),
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
			'alias' => Yii::t('global', 'Alias'),
            'type' => Yii::t('global', 'Type'),
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
        $criteria->compare('type',$this->type,true);
		$criteria->compare('alias',$this->alias,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
		));
	}

    public function beforeValidate()
    {
        if (trim($this->alias) == '')
            $this->alias = self::model()->getAlias( $this->name );

        return parent::beforeValidate();
    }
    public function afterDelete()
    {
        self::model()->deleteAll("alias = '{$this->alias}'");
        return parent::afterDelete();
    }
    public function getAlias( $alias=null )
    {
        return Yii::app()->func->makeAlias( $alias !== null ? $alias : $this->alias );
    }

    /**
     * after save method
     */
    public function afterSave()
    {
        Yii::app()->urlManager->clearCache();

        return parent::afterSave();
    }

    /**
     * Check alias and language combination
     */
    public function CheckUniqueAlias()
    {
        if( $this->isNewRecord )
        {
            // Check if we already have an alias with those parameters
            if( self::model()->exists('alias=:alias', array(':alias' => $this->alias ) ) )
            {
                $this->addError('alias', Yii::t('custompages', 'There is already a page with that alias and language combination.'));
            }
        }
        else
        {
            // Check if we already have an alias with those parameters
            if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $this->id, ':alias' => $this->alias ) ) )
            {
                $this->addError('alias', Yii::t('custompages', 'There is already a page with that alias and language combination.'));
            }
        }
    }

}