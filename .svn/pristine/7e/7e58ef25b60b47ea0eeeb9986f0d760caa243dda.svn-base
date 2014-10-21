<?php

/**
 * This is the model class for table "site_templates".
 *
 * The followings are the available columns in table 'site_templates':
 * @property integer $id
 * @property string $name
 * @property string $settings
 * @property integer $campaign_id 
 * @property string $created
 * @property string $updated
 * @property string $screenshot
 *
 * The followings are the available model relations:
 * @property CampaignTemplate[] $campaignTemplates
 */
class SiteTemplates extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SiteTemplates the static model class
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
		return 'site_templates';
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
			//array('campaign_id', 'numerical', 'integerOnly'=>true),           
			array('name, screenshot, bg_color', 'length', 'max'=>255),
			array('settings, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, settings, created, updated, screenshot, bg_color', 'safe', 'on'=>'search'),
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
			'campaignTemplates' => array(self::HAS_MANY, 'CampaignTemplate', 'site_template_id'),
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
			'settings' => Yii::t('global', 'Settings'),
            //'campaign_id' => Yii::t('global', 'Campaign'),            
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
			'screenshot' => Yii::t('global', 'Screenshot'),
            'bg_color' => Yii::t('global', 'Background Color'),
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
		$criteria->compare('settings',$this->settings,true);
        //$criteria->compare('campaign_id',$this->campaign_id);        
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('screenshot',$this->screenshot,true);
        $criteria->compare('bg_color',$this->bg_color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}