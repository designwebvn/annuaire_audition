<?php

/**
 * This is the model class for table "services".
 *
 * The followings are the available columns in table 'services':
 * @property integer $id
 * @property string $name
 * @property integer $cochlear_implant
 * @property string $title_1
 * @property string $description_1
 * @property string $email_1
 * @property string $title_2
 * @property string $description_2
 * @property string $email_2
 * @property string $title_3
 * @property string $description_3
 * @property string $email_3
 * @property double $ranking
 * @property string $created
 * @property string $updated
 * @property integer $department
 *
 * The followings are the available model relations:
 * @property Maps $department0
 * @property ServiceAgencies[] $serviceAgencies
 * @property ServiceArticles[] $serviceArticles
 * @property ServiceCenters[] $serviceCenters
 * @property ServiceEvents[] $serviceEvents
 * @property ServiceHearingTv[] $serviceHearingTvs
 * @property ServiceNews[] $serviceNews
 * @property ServiceSpeechTherapists[] $serviceSpeechTherapists
 */
class Services extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Services the static model class
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
		return 'services';
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
            array('email_1, email_2, email_3','email'),
			array('cochlear_implant', 'numerical', 'integerOnly'=>true),
			array('ranking', 'numerical'),
			array('name, title_1, description_1, title_2, description_2, title_3, description_3', 'length', 'max'=>255),
			array('email_1, email_2, email_3', 'length', 'max'=>150),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, cochlear_implant, title_1, description_1, email_1, title_2, description_2, email_2, title_3, description_3, email_3, ranking, created, updated', 'safe', 'on'=>'search'),
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
            'serviceAgencies' => array(self::HAS_MANY, 'ServiceAgencies', 'service_id'),
            'serviceArticles' => array(self::HAS_MANY, 'ServiceArticles', 'service_id'),
            'serviceCenters' => array(self::HAS_MANY, 'ServiceCenters', 'service_id'),
            'serviceEvents' => array(self::HAS_MANY, 'ServiceEvents', 'service_id'),
            'serviceHearingTvs' => array(self::HAS_MANY, 'ServiceHearingTv', 'service_id'),
            'serviceNews' => array(self::HAS_MANY, 'ServiceNews', 'service_id'),
            'serviceSpeechTherapists' => array(self::HAS_MANY, 'ServiceSpeechTherapists', 'service_id'),
            /*'department0' => array(self::BELONGS_TO, 'Maps', 'department'),*/
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
			'cochlear_implant' => Yii::t('global', 'Cochlear Implant'),
			'title_1' => Yii::t('global', 'Title 1'),
			'description_1' => Yii::t('global', 'Phone 1'),
			'email_1' => Yii::t('global', 'Email 1'),
			'title_2' => Yii::t('global', 'Title 2'),
			'description_2' => Yii::t('global', 'Phone 2'),
			'email_2' => Yii::t('global', 'Email 2'),
			'title_3' => Yii::t('global', 'Title 3'),
			'description_3' => Yii::t('global', 'Phone 3'),
			'email_3' => Yii::t('global', 'Email 3'),
			'ranking' => Yii::t('global', 'Order'),
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
        /*$criteria->together = true;
        $criteria->with     = array('department0');*/

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cochlear_implant',$this->cochlear_implant);
		$criteria->compare('title_1',$this->title_1,true);
		$criteria->compare('description_1',$this->description_1,true);
		$criteria->compare('email_1',$this->email_1,true);
		$criteria->compare('title_2',$this->title_2,true);
		$criteria->compare('description_2',$this->description_2,true);
		$criteria->compare('email_2',$this->email_2,true);
		$criteria->compare('title_3',$this->title_3,true);
		$criteria->compare('description_3',$this->description_3,true);
		$criteria->compare('email_3',$this->email_3,true);
		$criteria->compare('ranking',$this->ranking);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'ranking ',
            ),
		));
	}

    public function getNameService( $id ){
        $speech = Services::model()->findByPk($id);
        return '<a href="/admin/services/view?id='.$id.'">'.$speech['name'].'</a>';
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'name',
        ));
        foreach($models as $model){
            $arr[$model->id]['name']=$model->name;
        }
    }

    function getServiceNewsId(){
        if ($this->id){
            $models = ServiceNews::model()->findAllByAttributes(array('service_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->news_id;

            return $arr;
        }
        return array();
    }

    function getServiceArticlesId(){
        if ($this->id){
            $models = ServiceArticles::model()->findAllByAttributes(array('service_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->product_id;

            return $arr;
        }
        return array();
    }

    function getServiceHearingTvId(){
        if ($this->id){
            $models = ServiceHearingTv::model()->findAllByAttributes(array('service_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    function getServiceEventsId(){
        if ($this->id){
            $models = ServiceEvents::model()->findAllByAttributes(array('service_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->event_id;

            return $arr;
        }
        return array();
    }

    function getCategoriesId(){
        if ($this->id){
            $models = ServiceCenters::model()->findAllByAttributes(array('service_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->center_id;

            return $arr;
        }
        return array();
    }

    function getServiceSpeechTherapistId(){
        if ($this->id){
            $models = ServiceSpeechTherapists::model()->findAllByAttributes(array('service_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->speech_therapists_id;

            return $arr;
        }
        return array();
    }

    function getServiceAgenciesId(){
        if ($this->id){
            $models = ServiceAgencies::model()->findAllByAttributes(array('service_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->agencies_id;

            return $arr;
        }
        return array();
    }

    function getServiceNews($id){
        $catProducts = ServiceNews::model()->findAllByAttributes(array('service_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view/?id='.$catProduct['news']['id']).">".$catProduct['news']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getServiceArticles($id){
        $catProducts = ServiceArticles::model()->findAllByAttributes(array('service_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view/?id='.$catProduct['product']['id']).">".$catProduct['product']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getServiceHearingTv($id){
        $catProducts = ServiceHearingTv::model()->findAllByAttributes(array('service_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view/?id='.$catProduct['video']['id']).">".$catProduct['video']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getServiceEvents($id){
        $catProducts = ServiceEvents::model()->findAllByAttributes(array('service_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/events/view/?id='.$catProduct['event']['id']).">".$catProduct['event']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getServiceCenters($id){
        $catProducts = ServiceCenters::model()->findAllByAttributes(array('service_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view/?id='.$catProduct['center']['id']).">".$catProduct['center']['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getServiceSpeechTherapist($id){
        $catProducts = ServiceSpeechTherapists::model()->findAllByAttributes(array('service_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/speechTherapist/view/?id='.$catProduct['speechTherapists']['id']).">".$catProduct['speechTherapists']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getServiceAgencies($id){
        $catProducts = ServiceAgencies::model()->findAllByAttributes(array('service_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/agencies/view/?id='.$catProduct['agencies']['id']).">".$catProduct['agencies']['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }


}