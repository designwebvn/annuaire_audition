<?php

/**
 * This is the model class for table "networks".
 *
 * The followings are the available columns in table 'networks':
 * @property integer $id
 * @property string $corporate_name
 * @property string $grip
 * @property string $description
 * @property string $grip_related_centers
 * @property string $description_related_centers
 * @property integer $advertiser
 * @property string $address_1
 * @property string $additional_address
 * @property string $po_box
 * @property string $zip_cedex_address_1
 * @property string $city_cedex_address_1
 * @property string $city_1
 * @property string $zip_1
 * @property string $phone_number_1a
 * @property string $phone_1b
 * @property string $fax_1a
 * @property string $fax_1b
 * @property string $a_email_1a
 * @property string $email_1b
 * @property string $website_1a
 * @property string $website_1b
 * @property string $address_2
 * @property string $additional_address_2
 * @property string $po_box_address_2
 * @property string $zip_cedes_address_2
 * @property string $city_cedex_address
 * @property string $city_2
 * @property string $zip_2
 * @property string $phone_2a
 * @property string $phone_2b
 * @property string $fax_2a
 * @property string $fax_2b
 * @property string $email_2a
 * @property string $email_2b
 * @property string $website_2a
 * @property string $website_2b
 * @property string $logo
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property NetworkAnnoucements[] $networkAnnoucements
 * @property NetworkArticles[] $networkArticles
 * @property NetworkEvents[] $networkEvents
 * @property NetworkNews[] $networkNews
 * @property NetworkVideos[] $networkVideoses
 */
class Networks extends CActiveRecord
{
    const STATUS_YES  = 1;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Networks the static model class
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
		return 'networks';
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
			array('corporate_name, advertiser', 'required'),
            array('a_email_1a, email_1b, email_2a, email_2b','email'),
            array('phone_number_1a, phone_1b, phone_2a, phone_2b, fax_1a, fax_1b, fax_2a, fax_2b', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
			array('website_1a, website_1b, website_2a, website_2b', 'url', 'defaultScheme' => 'http'),
            array('advertiser', 'numerical', 'integerOnly'=>true),
			array('corporate_name, grip, description, grip_related_centers, description_related_centers, address_1, additional_address, po_box, zip_cedex_address_1, city_cedex_address_1, city_1', 'length', 'max'=>255),
			array('zip_1, phone_number_1a, phone_1b, fax_1a, fax_1b, a_email_1a, email_1b, website_1a, website_1b, address_2, additional_address_2, po_box_address_2, zip_cedes_address_2, city_cedex_address, city_2, zip_2, phone_2a, phone_2b, fax_2a, fax_2b, email_2a, email_2b, website_2a, website_2b, logo', 'length', 'max'=>150),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, corporate_name, grip, description, grip_related_centers, description_related_centers, advertiser, address_1, additional_address, po_box, zip_cedex_address_1, city_cedex_address_1, city_1, zip_1, phone_number_1a, phone_1b, fax_1a, fax_1b, a_email_1a, email_1b, website_1a, website_1b, address_2, additional_address_2, po_box_address_2, zip_cedes_address_2, city_cedex_address, city_2, zip_2, phone_2a, phone_2b, fax_2a, fax_2b, email_2a, email_2b, website_2a, website_2b, logo, created, updated', 'safe', 'on'=>'search'),
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
            'networkAnnoucements' => array(self::HAS_MANY, 'NetworkAnnoucements', 'network_id'),
            'networkArticles' => array(self::HAS_MANY, 'NetworkArticles', 'network_id'),
            'networkEvents' => array(self::HAS_MANY, 'NetworkEvents', 'network_id'),
            'networkNews' => array(self::HAS_MANY, 'NetworkNews', 'network_id'),
            'networkVideoses' => array(self::HAS_MANY, 'NetworkVideos', 'network_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'corporate_name' => Yii::t('global', 'Corporate Name'),
			'grip' => Yii::t('global', 'Grip'),
			'description' => Yii::t('global', 'Description'),
			'grip_related_centers' => Yii::t('global', 'Grip Related Centers'),
			'description_related_centers' => Yii::t('global', 'Description Related Centers'),
			'advertiser' => Yii::t('global', 'Advertiser'),
			'address_1' => Yii::t('global', 'Address 1'),
			'additional_address' => Yii::t('global', 'Additional Address'),
			'po_box' => Yii::t('global', 'Po Box'),
			'zip_cedex_address_1' => Yii::t('global', 'Zip Cedex Address 1'),
			'city_cedex_address_1' => Yii::t('global', 'City Cedex Address 1'),
			'city_1' => Yii::t('global', 'City 1'),
			'zip_1' => Yii::t('global', 'Zip 1'),
			'phone_number_1a' => Yii::t('global', 'Phone Number 1a'),
			'phone_1b' => Yii::t('global', 'Phone 1b'),
			'fax_1a' => Yii::t('global', 'Fax 1a'),
			'fax_1b' => Yii::t('global', 'Fax 1b'),
			'a_email_1a' => Yii::t('global', 'A Email 1a'),
			'email_1b' => Yii::t('global', 'Email 1b'),
			'website_1a' => Yii::t('global', 'Website 1a'),
			'website_1b' => Yii::t('global', 'Website 1b'),
			'address_2' => Yii::t('global', 'Address 2'),
			'additional_address_2' => Yii::t('global', 'Additional Address 2'),
			'po_box_address_2' => Yii::t('global', 'Po Box Address 2'),
			'zip_cedes_address_2' => Yii::t('global', 'Zip Cedes Address 2'),
			'city_cedex_address' => Yii::t('global', 'City Cedex Address'),
			'city_2' => Yii::t('global', 'City 2'),
			'zip_2' => Yii::t('global', 'Zip 2'),
			'phone_2a' => Yii::t('global', 'Phone 2a'),
			'phone_2b' => Yii::t('global', 'Phone 2b'),
			'fax_2a' => Yii::t('global', 'Fax 2a'),
			'fax_2b' => Yii::t('global', 'Fax 2b'),
			'email_2a' => Yii::t('global', 'Email 2a'),
			'email_2b' => Yii::t('global', 'Email 2b'),
			'website_2a' => Yii::t('global', 'Website 2a'),
			'website_2b' => Yii::t('global', 'Website 2b'),
			'logo' => Yii::t('global', 'Logo'),
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
		$criteria->compare('corporate_name',$this->corporate_name,true);
		$criteria->compare('grip',$this->grip,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('grip_related_centers',$this->grip_related_centers,true);
		$criteria->compare('description_related_centers',$this->description_related_centers,true);
		$criteria->compare('advertiser',$this->advertiser);
		$criteria->compare('address_1',$this->address_1,true);
		$criteria->compare('additional_address',$this->additional_address,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('zip_cedex_address_1',$this->zip_cedex_address_1,true);
		$criteria->compare('city_cedex_address_1',$this->city_cedex_address_1,true);
		$criteria->compare('city_1',$this->city_1,true);
		$criteria->compare('zip_1',$this->zip_1,true);
		$criteria->compare('phone_number_1a',$this->phone_number_1a,true);
		$criteria->compare('phone_1b',$this->phone_1b,true);
		$criteria->compare('fax_1a',$this->fax_1a,true);
		$criteria->compare('fax_1b',$this->fax_1b,true);
		$criteria->compare('a_email_1a',$this->a_email_1a,true);
		$criteria->compare('email_1b',$this->email_1b,true);
		$criteria->compare('website_1a',$this->website_1a,true);
		$criteria->compare('website_1b',$this->website_1b,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('additional_address_2',$this->additional_address_2,true);
		$criteria->compare('po_box_address_2',$this->po_box_address_2,true);
		$criteria->compare('zip_cedes_address_2',$this->zip_cedes_address_2,true);
		$criteria->compare('city_cedex_address',$this->city_cedex_address,true);
		$criteria->compare('city_2',$this->city_2,true);
		$criteria->compare('zip_2',$this->zip_2,true);
		$criteria->compare('phone_2a',$this->phone_2a,true);
		$criteria->compare('phone_2b',$this->phone_2b,true);
		$criteria->compare('fax_2a',$this->fax_2a,true);
		$criteria->compare('fax_2b',$this->fax_2b,true);
		$criteria->compare('email_2a',$this->email_2a,true);
		$criteria->compare('email_2b',$this->email_2b,true);
		$criteria->compare('website_2a',$this->website_2a,true);
		$criteria->compare('website_2b',$this->website_2b,true);
		$criteria->compare('logo',$this->logo,true);
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

    function getStatusNetwork( $status ){
        if($status==self::STATUS_YES)
            return Yii::t('global','Yes');
        return Yii::t('global','No');
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'corporate_name',
        ));
        foreach($models as $model){
            $arr[$model->id]['corporate_name']=$model->corporate_name;
        }
    }

    function showAdminImage(){
        $image = ($this->logo!='')?$this->logo:'no_image.gif';
        return '<a class="fancybox" href="/uploads/audios/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/audios/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function showAdminImageNew( $image ){
        $image = ($image!='')?$image:'no_image.gif';
        return '<a class="fancybox" href="/uploads/audios/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/audios/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function getNetworkNewsId(){
        if ($this->id){
            $models = NetworkNews::model()->findAllByAttributes(array('network_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->news_id;

            return $arr;
        }
        return array();
    }

    function getNetworkArticlesId(){
        if ($this->id){
            $models = NetworkArticles::model()->findAllByAttributes(array('network_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->product_id;

            return $arr;
        }
        return array();
    }

    function getNetworkVideoId(){
        if ($this->id){
            $models = NetworkVideos::model()->findAllByAttributes(array('network_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    function getNetworkEventId(){
        if ($this->id){
            $models = NetworkEvents::model()->findAllByAttributes(array('network_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->event_id;

            return $arr;
        }
        return array();
    }

    function getNetworkAnnouncementsId(){
        if ($this->id){
            $models = NetworkAnnoucements::model()->findAllByAttributes(array('network_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->annoucements_id;

            return $arr;
        }
        return array();
    }

    function getNetworkNews( $id ){
        $catProducts = NetworkNews::model()->findAllByAttributes(array('network_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view?id='.$catProduct['news']['id']).">".$catProduct['news']['title']."</a></label>";
        }
        return $listCatProduct;
    }

    function getNetworkArticles( $id ){
        $catProducts = NetworkArticles::model()->findAllByAttributes(array('network_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view?id='.$catProduct['product']['id']).">".$catProduct['product']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getNetworkVideos( $id ){
        $catProducts = NetworkVideos::model()->findAllByAttributes(array('network_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view?id='.$catProduct['video']['id']).">".$catProduct['video']['title']."</a></label>";
        }
        return $listCatProduct;
    }

    function getNetworkEvents( $id ){
        $catProducts = NetworkEvents::model()->findAllByAttributes(array('network_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/events/view?id='.$catProduct['event']['id']).">".$catProduct['event']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getNetworkAnnouncements( $id ){
        $catProducts = NetworkAnnoucements::model()->findAllByAttributes(array('network_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/announcements/view?id='.$catProduct['annoucements']['id']).">".$catProduct['annoucements']['company']."</a></label>";
        }
        return $listCatProduct;
    }


}