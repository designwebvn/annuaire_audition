<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $grip
 * @property string $image
 * @property integer $category_id
 * @property string $pdf
 * @property string $external_link
 * @property string $video
 * @property integer $is_active
 * @property string $alias
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property NewsComments[] $newsComments
 * @property NewsGalleries[] $newsGalleries
 * @property NewsCenters[] $newsCenters
 * @property NewsSpecialEducationSchools[] $newsSpecialEducationSchools
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	const STATUS_ACTIVE                 = 1;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
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
			array('pdf', 'file', 'allowEmpty'=>true, 'types'=>'pdf', 'message'=>'pdf files only', 'on'=>'create'),
			array('pdf', 'file', 'allowEmpty'=>true, 'types'=>'pdf', 'message'=>'pdf files only', 'on'=>'update'),
			array('title, description, grip, category_id', 'required'),
			array('alias', 'CheckUniqueAlias'),
			array('category_id, is_active', 'numerical', 'integerOnly'=>true),
			array('title, pdf, external_link, video, alias', 'length', 'max'=>255),
			array('image', 'length', 'max'=>250),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, grip, image, category_id, pdf, external_link, video, is_active, alias,created, updated', 'safe', 'on'=>'search'),
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
			'newsComments' => array(self::HAS_MANY, 'NewsComments', 'news_id'),
			'category' => array(self::BELONGS_TO, 'NewsCategorys', 'category_id'),
            'newsGalleries' => array(self::HAS_MANY, 'NewsGalleries', 'news_id'),
            'newsCenters' => array(self::HAS_MANY, 'NewsCenters', 'news_id'),
            'newsSpecialEducationSchools' => array(self::HAS_MANY, 'NewsSpecialEducationSchools', 'news_id'),
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
			'description' => Yii::t('global', 'Description'),
			'grip' => Yii::t('global', 'Grip'),
			'image' => Yii::t('global', 'Image'),
			'category_id' => Yii::t('global', 'Category'),
			'pdf' => Yii::t('global', 'Pdf'),
			'external_link' => Yii::t('global', 'External Link'),
			'video' => Yii::t('global', 'Video Link'),
			'is_active' => Yii::t('global', 'Disable in home ?'),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('grip',$this->grip,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('external_link',$this->external_link,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('alias',$this->alias,true);
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
			if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $this->id, ':alias' => $this->alias ) ) )         {
				$this->alias .= '-1'.$this->id;
				$this->CheckUniqueAlias();
			}
		}
	}

	public function CheckUniqueAliasNew( $id ,$alias )
	{
		// Check if we already have an alias with those parameters
		if( self::model()->exists('alias=:alias AND id!=:id', array( ':id' => $id, ':alias' => $alias ) ) )         {
			$alias .= '-'.$id;
		}
		return $alias;
	}

	public function getAliasLabels(  ){
		$this->alias = strtolower(str_replace(' ', '-', $this->name));
		$this->alias = strtolower(str_replace('~[^-\w]+~', '', $this->alias));
		$this->alias = preg_replace('/[^A-Za-z0-9_\-]/', '', $this->alias);
		$this->alias = strtolower(str_replace("'", '', $this->alias));
		$this->alias = $this->CheckUniqueAliasNew( $this->id, $this->alias );
		Yii::app()->db->createCommand()
			->update( 'news',
				array( 'alias' => $this->alias ),
				'id =:id',
				array( ':id'=> $this->id )
			);
	}

	public function beforeSave()
	{
		$this->alias = strtolower(str_replace(' ', '-', $this->title));
		$this->alias = strtolower(str_replace(array('+', '&'), '', $this->alias));
		$this->alias = $this->CheckUniqueAliasNew( $this->id, $this->alias );

		return parent::beforeSave();
	}

	function showAdminImage(){
        $image = ($this->image!='')?$this->image:'no_image.gif';
		return '<a class="fancybox" href="/uploads/news/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/news/'.$image.'" style="height: 40px;"/>
				</a>';
	}

	function showAdminImageNew( $image ){
        $image = ($image!='')?$image:'no_image.gif';
		return '<a class="fancybox" href="/uploads/news/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/news/'.$image.'" style="height: 40px;"/>
				</a>';
	}

	function getActiveNews(){
		$active_news = array(
			Yii::t('global','Disable'),
			Yii::t('global','Enable')
		);
		return $active_news;
	}


	function getStatusNews($status){
		if($status==self::STATUS_ACTIVE)
			return Yii::t('global','Enable');
		return Yii::t('global','Disable');
	}

	function getNewsCategory($id){
		$catNews = NewsCategorys::model()->findAllByAttributes(array('id' => $id));
		$listCatNews ="";
		foreach($catNews as $catNewsa){
			$listCatNews .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/newsCategorys/view/?id='.$catNewsa['id']).">".$catNewsa['name']."</a></label>";
		}
		return $listCatNews;
	}

	public function renImageNews($image,$alt='',$class=''){

		if($image == '')   	$image = 'noimage.png';
		if($alt!='') 		$alt 	= ' alt="'.$alt.'" ';
		if($class!='') 		$class = ' class="'.$class.'" ';		

		return '<img '.$alt.' '.$class.' src="/uploads/news/'.$image.'"/>';
	}

	function getNewByCategory($catId){
		
		 $sql = "SELECT news.id, news.title, news.description, news.alias as newsalias, news.image , news_categorys.name as catname, news_categorys.alias as catalias
				FROM news 
				INNER JOIN news_categorys
				ON news.category_id = news_categorys.id
				WHERE news_categorys.id = ".$catId." AND news.is_active = 1 ORDER BY news.id DESC LIMIT   0,1 ";

		$contents = Yii::app()->db->createCommand($sql)->queryAll();
		if($contents){
			foreach ($contents as $content) {
				return $content;
			}
		}
		else
			return null;
	}

	function countNewByCategory($id){
		return NewsComments::model()->countByAttributes(array('news_id'=>$id,'is_active'=>NewsComments::STATUS_APPROVED));
	}

	public function getNewsByAlias($alias){
        return News::model()->findByAttributes(array('alias'=>$alias));
    }
	
	public function getUrl()
	{
		return Yii::app()->createUrl('news/view', array(
			'id'=>$this->id,
			'title'=>$this->title,
		));
	}

	public function addNewsComments($comment)
	{
		if(Yii::app()->params['commentNewsNeedApproval'])
			$comment->is_active=NewsComments::STATUS_PENDING;
		else
			$comment->is_active=NewsComments::STATUS_PENDING;	
		$comment->news_id=$this->id;
		return $comment->save();
	}

    public function getNewsCentersId(){
    if ($this->id){
        $models = NewsCenters::model()->findAllByAttributes(array('news_id' => $this->id));
        $arr = array();
        foreach ($models as $model)
            $arr[] = $model->centers_id;

        return $arr;
    }
    return array();
    }

    function getNewsCenters($id){
        $catProducts = NewsCenters::model()->findAllByAttributes(array('news_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view/?id='.$catProduct['centers']['id']).">".$catProduct['centers']['corporate_name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getNewsSpecialEducationSchools($id){
        $catProducts = NewsSpecialEducationSchools::model()->findAllByAttributes(array('news_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/specialEducationSchools/view/?id='.$catProduct['specialEducationSchools']['id']).">".$catProduct['specialEducationSchools']['corporate_name']."</a></label>";
        }
        return $listCatProduct;
    }

    public function getNewsSpecialEducationSchoolsId(){
        if ($this->id){
            $models = NewsSpecialEducationSchools::model()->findAllByAttributes(array('news_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->special_education_schools_id;

            return $arr;
        }
        return array();
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'title',
        ));
        foreach($models as $model){
            $arr[$model->id]['title'] = $model->title;
        }
    }


}