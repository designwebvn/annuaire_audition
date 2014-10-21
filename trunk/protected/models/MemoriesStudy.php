<?php

/**
 * This is the model class for table "memories_study".
 *
 * The followings are the available columns in table 'memories_study':
 * @property integer $id
 * @property string $title
 * @property string $grip
 * @property string $date
 * @property string $pdf_file
 * @property string $created
 * @property string $updated
 */
class MemoriesStudy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemoriesStudy the static model class
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
		return 'memories_study';
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
			array('title', 'required'),
			array('title, pdf_file', 'length', 'max'=>255),
			array('date', 'length', 'max'=>150),
			array('grip, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, grip, date, pdf_file, created, updated', 'safe', 'on'=>'search'),
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
			'title' => Yii::t('global', 'Title'),
			'grip' => Yii::t('global', 'Grip'),
			'date' => Yii::t('global', 'Year'),
			'pdf_file' => Yii::t('global', 'Pdf file'),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('grip',$this->grip,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('pdf_file',$this->pdf_file,true);
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

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'title',
        ));
        foreach($models as $model){
            $arr[$model->id]['title']=$model->title;
        }
    }

}