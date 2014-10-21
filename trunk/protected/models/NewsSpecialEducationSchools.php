<?php

/**
 * This is the model class for table "news_special_education_schools".
 *
 * The followings are the available columns in table 'news_special_education_schools':
 * @property integer $id
 * @property integer $news_id
 * @property integer $special_education_schools_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property SpecialEducationSchools $specialEducationSchools
 */
class NewsSpecialEducationSchools extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsSpecialEducationSchools the static model class
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
		return 'news_special_education_schools';
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
			array('news_id, special_education_schools_id', 'required'),
			array('news_id, special_education_schools_id', 'numerical', 'integerOnly'=>true),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, news_id, special_education_schools_id, created, updated', 'safe', 'on'=>'search'),
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
			'specialEducationSchools' => array(self::BELONGS_TO, 'SpecialEducationSchools', 'special_education_schools_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'news_id' => Yii::t('global', 'News'),
			'special_education_schools_id' => Yii::t('global', 'Special Education Schools'),
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
		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('special_education_schools_id',$this->special_education_schools_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}