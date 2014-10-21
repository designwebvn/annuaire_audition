<?php

/**
 * This is the model class for table "audios_comments".
 *
 * The followings are the available columns in table 'audios_comments':
 * @property integer $id
 * @property integer $audio_id
 * @property integer $parent_id
 * @property integer $type
 * @property string $subject
 * @property string $author
 * @property string $content
 * @property integer $is_active
 * @property string $created
 * @property string $updated
 */
class AudiosComments extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AudiosComments the static model class
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
		return 'audios_comments';
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
			array('audio_id, subject, author', 'required'),
			array('audio_id, parent_id, type, is_active', 'numerical', 'integerOnly'=>true),
			array('subject, author', 'length', 'max'=>255),
			array('content, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, audio_id, parent_id, type, subject, author, content, is_active, created, updated', 'safe', 'on'=>'search'),
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
			'audio_id' => Yii::t('centers', 'Centers'),
			'parent_id' => Yii::t('global', 'Parent'),
			'type' => Yii::t('global', 'Type'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('audio_id',$this->audio_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('is_active',$this->is_active);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                /*'attributes'=>array(
                    'new_title'=>array(
                        'asc'=>'news.title',
                        'desc'=>'news.title DESC',
                    ),
                    'parent.subject'=>array(
                        'asc'=>'parent_id',
                        'desc'=>'parent_id DESC',
                    ),
                    '*',
                ),*/
            ),
		));
	}

    function getStatusAudiosComments( $status ){
        if($status==self::STATUS_ACTIVE)
            return Yii::t('global','Enable');
        return Yii::t('global','Disable');
    }

    function getTitleAudios( $id ){
        $catNews    = Centers::model()->findByPk( $id );
        $titleNews = "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view/?id='.$catNews['id']).">".$catNews['corporate_name']."</a></label>";
        return $titleNews;
    }

}