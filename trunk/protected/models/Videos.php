<?php

/**
 * This is the model class for table "videos".
 *
 * The followings are the available columns in table 'videos':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $pictures
 * @property string $video
 * @property string $grip
 * @property string $description
 * @property integer $type
 * @property integer $is_home
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property VideoComments[] $videoComments
 * @property VideoCates[] $videoCates
 * @property VideoArticles[] $videoArticles
 * @property VideoCenters[] $videoCenters
 */
class Videos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Videos the static model class
	 */
	const STATUS_ACTIVE                 = 1;
	const STATUS_PUBLIC                 = 1;
    public $category;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'videos';
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
			array('video', 'file', 'allowEmpty'=>true, 'types'=>'mp4,flv,f4v', 'message'=>'video files only', 'on'=>'create'),
			array('video', 'file', 'allowEmpty'=>true, 'types'=>'mp4,flv,f4v', 'message'=>'video files only', 'on'=>'update'),

			array('title, video, description', 'required'),
			array('type, is_home', 'numerical', 'integerOnly'=>true),
			array('title, alias, pictures, video, grip', 'length', 'max'=>255),
            array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, pictures, video, grip, description, type, is_home, created, updated, category', 'safe', 'on'=>'search'),
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
            'videoComments' => array(self::HAS_MANY, 'VideoComments', 'video_id'),
            'videoCates' => array(self::HAS_MANY, 'VideoCates', 'video_id'),
            'videoArticles' => array(self::HAS_MANY, 'VideoArticles', 'video_id'),
            'videoCenters' => array(self::HAS_MANY, 'VideoCenters', 'video_id'),
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
			'alias' => Yii::t('global', 'Alias'),
			'pictures' => Yii::t('global', 'Photo'),
			'video' => Yii::t('global', 'Video'),
			'grip' => Yii::t('global', 'Grip'),
			'description' => Yii::t('global', 'Description'),
			'type' => Yii::t('global', 'Type'),
			'is_home' => Yii::t('global', 'Disable in home ?'),
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
        $criteria->with = array('videoCates.category');

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('pictures',$this->pictures,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('grip',$this->grip,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('is_home',$this->is_home);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);
        $criteria->compare('category.id',$this->category);

		return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'category'=>array(
                        'asc'=>'category.name',
                        'desc'=>'category.name DESC',
                    ),
                    '*',
                ),
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
		$this->alias = strtolower(str_replace(' ', '-', $this->title));
        $this->alias = strtolower(str_replace(array('+', '&', '?'), '', $this->alias));
        	
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

	//tung add
	function getStatusVideo($status){
		if($status==self::STATUS_ACTIVE)
			return Yii::t('global','Enable');
		return Yii::t('global','Disable');
	}

	function getActiveVideo(){
		$active_product = array(
		  Yii::t('global','Disable'),
		  Yii::t('global','Enable')
		);
		return $active_product;
	}

	function getTypeVideo($status){
		if($status==self::STATUS_PUBLIC)
			return Yii::t('global','Public');
		return Yii::t('global','Professional');
	}

	function getPublicVideo(){
		$public_product = array(
			Yii::t('global','Professional'),
			Yii::t('global','Public')		  
		);
		return $public_product;
	}

	function showAdminImage(){
        $image  = $this->pictures != ''?$this->pictures:'noimage.png';
		return '<a class="fancybox" href="/uploads/video/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/video/'.$image.'" style="height: 40px;"/>
				</a>';
	}

	public function renImageVideo($image,$alt='',$class=''){

		if($image == '')   	$image = 'noimage.png';
		if($alt!='') 		$alt 	= ' alt="'.$alt.'" ';
		if($class!='') 		$class = ' class="'.$class.'" ';		

		return '<img '.$alt.' '.$class.' src="/uploads/video/'.$image.'"/>';
	}

	function getVideoByType($type,$postion){
		if($postion == 0){
			$limit 	= 1;
			$offset = 0;
		}
		else{
			$limit 	= 4;
			$offset = 1;
		}
		return Videos::model()->findAllByAttributes(
					array('is_home'=>1,'type'=>$type),
					array('order'=>'created DESC','limit'=> $limit,'offset' => $offset)
				);

	}

    function getVideoFrontEnd($url){
        $result='<a href="/uploads/video/'.$url.'" class="player" id="huluPlayer"></a>';
        $result.="<script type='text/javascript'>";
        $result.='$f("huluPlayer", "http://releases.flowplayer.org/swf/flowplayer-3.2.16.swf", {
                    clip: {
                  autoPlay: true,
                                            autoBuffering: true
                                        },
                                        plugins: {
                                            controls: {
                                                all: false,
                                                timeColor: "#980118",
                                                play: true,
                                                mute: true,
                                                volume: true,
                                                fullscreen: true
                                }
                            }
                        });';
        $result.='</script>';
        return $result;
    }

    function totalCommentById( $id ){
        return VideoComments::model()->countByAttributes(array('video_id'=>$id,'is_active'=>VideoComments::STATUS_ACTIVE));
    }

    public function getCategoriesId(){
        if ($this->id){
            $models = VideoCates::model()->findAllByAttributes(array('video_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->category_id;

            return $arr;
        }
        return array();
    }

    function getVideoCategory($id){
        $catProducts = VideoCates::model()->findAllByAttributes(array('video_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videoCategories/view?id='.$catProduct['category']['id']).">".$catProduct['category']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
        'order'=>'title',
        ));
        foreach($models as $model){
        $arr[$model->id]['title']=$model->title;
        $arr[$model->id]['alias']=$model->alias;
        }
    }

    public function getVideoArticlesId(){
        if ($this->id){
            $models = VideoArticles::model()->findAllByAttributes(array('video_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->product_id;

            return $arr;
        }
        return array();
    }

    public function getVideoCentersId(){
        if ($this->id){
            $models = VideoCenters::model()->findAllByAttributes(array('video_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->centers_id;

            return $arr;
        }
        return array();
    }

    function getVideoArticles( $id ){
        $catProducts = VideoArticles::model()->findAllByAttributes(array('video_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view?id='.$catProduct['product']['id']).">".$catProduct['product']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getVideosCenters( $id ){
        $catProducts = VideoCenters::model()->findAllByAttributes(array('video_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view?id='.$catProduct['centers']['id']).">".$catProduct['centers']['corporate_name']."</a></label>";
        }
        return $listCatProduct;
    }


}