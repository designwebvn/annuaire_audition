<?php

/**
 * This is the model class for table "video_comments".
 *
 * The followings are the available columns in table 'video_comments':
 * @property integer $id
 * @property integer $video_id
 * @property integer $parent_id
 * @property string $subject
 * @property string $author
 * @property string $content
 * @property integer $is_active
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property VideoComments $parent
 * @property VideoComments[] $videoComments
 * @property Videos $videos
 *
 */
class VideoComments extends CActiveRecord
{
    const STATUS_ACTIVE = 1;

    public $video_title;
    public $verifyCode = false;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VideoComments the static model class
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
		return 'video_comments';
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
			array('video_id, parent_id, is_active', 'numerical', 'integerOnly'=>true),
			array('subject, author', 'length', 'max'=>255),
			array('content, created, updated', 'safe'),
            array('verifyCode', 'captcha', 'on'=>'captchaRequired'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, video_id, parent_id, subject, author, content, is_active, created, updated, video_title', 'safe', 'on'=>'search'),
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
            'videos' => array(self::BELONGS_TO, 'Videos', 'video_id'),
            'parent' => array(self::BELONGS_TO, 'VideoComments', 'parent_id'),
            'VideoComments' => array(self::HAS_MANY, 'VideoComments', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'video_id' => Yii::t('global', 'Video'),
			'parent_id' => Yii::t('global', 'Parent'),
			'subject' => Yii::t('global', 'Subject'),
			'author' => Yii::t('global', 'Author'),
			'content' => Yii::t('global', 'Content'),
			'is_active' => Yii::t('global', 'Is Active'),
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
        $criteria->together = true;
        $criteria->with = array('videos');

		$criteria->compare('id',$this->id);
		$criteria->compare('video_id',$this->video_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('content',$this->content,true);
        $criteria->compare('videos.title',$this->video_title, true);
		$criteria->compare('is_active',$this->is_active);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'video_title'=>array(
                        'asc'=>'videos.title',
                        'desc'=>'videos.title DESC',
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
            $parentName = VideoComments::model()->findByPk( $parent_id );
            $name       = $parentName['subject'];
        }
        return $name;
    }

    function getTitleNews( $id ){
        $catNews    = Videos::model()->findByPk( $id );
        $titleNews = "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view/?id='.$catNews['id']).">".$catNews['title']."</a></label>";
        return $titleNews;
    }

    function getStatusNewsComments($status){
        if($status==self::STATUS_ACTIVE)
            return Yii::t('global','Enable');
        return Yii::t('global','Disable');
    }

}