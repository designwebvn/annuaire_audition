<?php

/**
 * This is the model class for table "special_education_school_galleries".
 *
 * The followings are the available columns in table 'special_education_school_galleries':
 * @property integer $id
 * @property integer $special_education_school_id
 * @property string $filename
 * @property string $created
 * @property string $updated
 */
class SpecialEducationSchoolGalleries extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpecialEducationSchoolGalleries the static model class
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
		return 'special_education_school_galleries';
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
            array('special_education_school_id', 'numerical', 'integerOnly'=>true),
            array('filename', 'length', 'max'=>255),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, special_education_school_id, filename, created, updated', 'safe', 'on'=>'search'),
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
			'special_education_school_id' => Yii::t('global', 'Special Education School'),
			'filename' => Yii::t('global', 'Filename'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search( $id )
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('special_education_school_id',$id );
		$criteria->compare('filename',$this->filename);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    function afterDelete(){
        @unlink(Yii::app()->basePath.'/../uploads/special_education_school_gallery/'.$this->filename);
        return self::afterDelete();
    }

    function showImage(){

        return '<a class="fancybox" href="/uploads/special_education_school_gallery/'.$this->filename.'" rel="group">
            <img class="img-polaroid" src="/uploads/special_education_school_gallery/'.$this->filename.'" style="height: 50px;" />
            </a>';
    }
}