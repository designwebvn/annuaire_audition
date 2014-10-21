<?php

/**
 * This is the model class for table "blogposts".
 *
 * The followings are the available columns in table 'blogposts':
 * @property integer $id
 * @property integer $catid
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $alias
 * @property string $language
 * @property string $metadesc
 * @property string $metakeys
 * @property integer $views
 * @property integer $rating
 * @property integer $totalvotes
 * @property integer $status
 * @property integer $authorid
 * @property integer $postdate
 * @property integer $last_updated_date
 * @property integer $last_updated_author
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Blogcats $cat
 */
class Blogposts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Blogposts the static model class
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
		return 'blogposts';
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
			array('description, image', 'required'),
			array('catid, views, rating, totalvotes, status, authorid, postdate, last_updated_date, last_updated_author', 'numerical', 'integerOnly'=>true),
			array('title, metadesc, metakeys', 'length', 'max'=>255),
			array('alias', 'length', 'max'=>125),
			array('language', 'length', 'max'=>3),
			array('image', 'length', 'max'=>150),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, catid, title, description, content, alias, language, metadesc, metakeys, views, rating, totalvotes, status, authorid, postdate, last_updated_date, last_updated_author, image', 'safe', 'on'=>'search'),
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
			'cat' => array(self::BELONGS_TO, 'Blogcats', 'catid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'catid' => Yii::t('global', 'Catid'),
			'title' => Yii::t('global', 'Title'),
			'description' => Yii::t('global', 'Description'),
			'content' => Yii::t('global', 'Content'),
			'alias' => Yii::t('global', 'Alias'),
			'language' => Yii::t('global', 'Language'),
			'metadesc' => Yii::t('global', 'Metadesc'),
			'metakeys' => Yii::t('global', 'Metakeys'),
			'views' => Yii::t('global', 'Views'),
			'rating' => Yii::t('global', 'Rating'),
			'totalvotes' => Yii::t('global', 'Totalvotes'),
			'status' => Yii::t('global', 'Status'),
			'authorid' => Yii::t('global', 'Authorid'),
			'postdate' => Yii::t('global', 'Postdate'),
			'last_updated_date' => Yii::t('global', 'Last Updated Date'),
			'last_updated_author' => Yii::t('global', 'Last Updated Author'),
			'image' => Yii::t('global', 'Image'),
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
		$criteria->compare('catid',$this->catid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('metadesc',$this->metadesc,true);
		$criteria->compare('metakeys',$this->metakeys,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('totalvotes',$this->totalvotes);
		$criteria->compare('status',$this->status);
		$criteria->compare('authorid',$this->authorid);
		$criteria->compare('postdate',$this->postdate);
		$criteria->compare('last_updated_date',$this->last_updated_date);
		$criteria->compare('last_updated_author',$this->last_updated_author);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}