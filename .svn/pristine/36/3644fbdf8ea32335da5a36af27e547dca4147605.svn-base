<?php

/**
 * This is the model class for table "news_comments".
 *
 * The followings are the available columns in table 'news_comments':
 * @property integer $id
 * @property integer $news_id
 * @property integer $parent_id
 * @property string $subject
 * @property string $author
 * @property string $content
 * @property integer $is_active
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property NewsComments $parent
 * @property NewsComments[] $newsComments
 * @property News $news
 */
class NewsComments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsComments the static model class
	 */
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING=0;
	const STATUS_APPROVED=1;

    public $new_title;
    public $verifyCode = false;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news_comments';
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
            array('subject, author, content','required'),
			array('news_id, is_active', 'numerical', 'integerOnly'=>true),
			array('subject, author', 'length', 'max'=>255),
			array('content, created, updated', 'safe'),
            array('verifyCode', 'captcha', 'on'=>'captchaRequired'),
            //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, news_id, parent_id, subject, author, content, is_active, created, updated, new_title', 'safe', 'on'=>'search'),
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
            'news' => array(self::BELONGS_TO, 'News', 'news_id'),
            'parent' => array(self::BELONGS_TO, 'NewsComments', 'parent_id'),
            'NewsComments' => array(self::HAS_MANY, 'NewsComments', 'parent_id'),
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
            'parent_id' => Yii::t('global', 'Parent'),
			'subject' => Yii::t('global', 'Subject'),
			'author' => Yii::t('global', 'Author'),
			'content' => Yii::t('global', 'Content'),
			'is_active' => Yii::t('global', 'Is Active'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
			'verifyCode'=>'Please enter the captcha', // we have added this line
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
        $criteria->together = true;
        $criteria->with = array('news');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('news_id',$this->news_id);
        $criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('content',$this->content,true);
        $criteria->compare('news.title',$this->new_title, true);
		$criteria->compare('t.is_active',$this->is_active);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'new_title'=>array(
                        'asc'=>'news.title',
                        'desc'=>'news.title DESC',
                    ),
                    'parent.subject'=>array(
                        'asc'=>'parent_id',
                        'desc'=>'parent_id DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    public function getParentCategory( $parent_id ){
        $name       = '';
        if( $parent_id != 0 ){
            $parentName = NewsComments::model()->findByPk( $parent_id );
            $name       = $parentName['subject'];
        }
        return $name;
    }

    function getActiveNewsComments(){
        $active_news = array(
            Yii::t('global','Disable'),
            Yii::t('global','Enable')
        );
        return $active_news;
    }

    function getStatusNewsComments($status){
        if($status==self::STATUS_ACTIVE)
            return Yii::t('global','Enable');
        return Yii::t('global','Disable');
    }

    function getTitleNews( $id ){
        $catNews    = News::model()->findByPk( $id );
        $titleNews = "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view/?id='.$catNews['id']).">".$catNews['title']."</a></label>";
        return $titleNews;
    }

    public function getUrl($post=null)
	{
		if($post===null)
			$post=$this->post;
		return $post->url.'#c'.$this->id;
	}

}