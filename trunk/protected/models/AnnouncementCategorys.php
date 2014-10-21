<?php

/**
 * This is the model class for table "announcement_categorys".
 *
 * The followings are the available columns in table 'announcement_categorys':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Announcements[] $announcements
 */
class AnnouncementCategorys extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AnnouncementCategorys the static model class
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
		return 'announcement_categorys';
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
            array('name','required'),
			array('name, alias', 'length', 'max'=>255),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, alias, created, updated', 'safe', 'on'=>'search'),
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
			'announcements' => array(self::HAS_MANY, 'Announcements', 'category_id'),
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
		$criteria->compare('alias',$this->alias,true);
        if ($this->created)
            $criteria->compare('t.created',date('Y-m-d ', strtotime($this->created)),true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=> 't.id DESC',
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

}