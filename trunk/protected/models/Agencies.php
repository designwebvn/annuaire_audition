<?php

/**
 * This is the model class for table "agencies".
 *
 * The followings are the available columns in table 'agencies':
 * @property integer $id
 * @property string $corporate_name
 * @property string $corporate_name_2
 * @property integer $type
 * @property string $legal_status
 * @property integer $advertisers
 * @property string $logo
 * @property string $service
 * @property string $address_id
 * @property string $address
 * @property string $additional_address
 * @property string $city
 * @property integer $country
 * @property string $zip
 * @property string $po_box
 * @property string $zip_cedex
 * @property string $city_cedex
 * @property string $phone
 * @property string $phone_2
 * @property string $fax
 * @property string $email_1
 * @property string $email_2
 * @property string $email_3
 * @property string $grip
 * @property string $description
 * @property string $description_2
 * @property string $publishing
 * @property string $website
 * @property string $website_2
 * @property string $email
 * @property string $address_2
 * @property string $additional_address_2
 * @property string $city_2
 * @property string $zip_2
 * @property integer $country_2
 * @property string $po_box_cedex_2
 * @property string $zip_cedex_2
 * @property string $city_cedex_2
 * @property string $tel_1
 * @property string $tel_2
 * @property string $fax_2
 * @property string $image
 * @property string $created
 * @property string $updated
 * @property integer $department
 *
 * The followings are the available model relations:
 * @property AgenciesCategory $type0
 * @property Maps $department0
 * @property AgenciesArticles[] $agenciesArticles
 * @property AgenciesCenters[] $agenciesCenters
 * @property AgenciesEvents[] $agenciesEvents
 * @property AgenciesHearingTv[] $agenciesHearingTvs
 * @property AgenciesNews[] $agenciesNews
 * @property AgenciesSpeechTherapists[] $agenciesSpeechTherapists
 */
class Agencies extends CActiveRecord
{
	const STATUS_YES = 1;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Agencies the static model class
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
		return 'agencies';
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
			array('corporate_name, type, advertisers, address, city, country, zip, phone, fax, email_1', 'required'),
            array('email, email_1, email_2, email_3','email'),
            array('phone, phone_2, fax, fax_2', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
            array('website, website_2', 'url', 'defaultScheme' => 'http'),
			array('type, advertisers, country, country_2, department', 'numerical', 'integerOnly'=>true),
			array('corporate_name, corporate_name_2, legal_status, logo, description, publishing, description_2, address_2, zip_cedex_2, tel_1, tel_2, image', 'length', 'max'=>255),
			array('service, address_id, address, additional_address, city, zip, po_box, zip_cedex, city_cedex, phone, phone_2, fax, email_1, email_2, email_3, grip, website, website_2, email, additional_address_2, city_2, zip_2, po_box_cedex_2, city_cedex_2, fax_2', 'length', 'max'=>150),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, corporate_name, corporate_name_2, type, legal_status, advertisers, logo, service, address_id, address, additional_address, city, country, zip, po_box, zip_cedex, city_cedex, phone, phone_2, fax, email_1, email_2, email_3, grip, description, description_2, publishing, website, website_2, email, address_2, additional_address_2, city_2, zip_2, country_2, po_box_cedex_2, zip_cedex_2, city_cedex_2, tel_1, tel_2, fax_2, image, created, updated, department', 'safe', 'on'=>'search'),
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
            'type0' => array(self::BELONGS_TO, 'AgenciesCategory', 'type'),
            'department0' => array(self::BELONGS_TO ,'Maps', 'department'),
            'agenciesArticles' => array(self::HAS_MANY, 'AgenciesArticles', 'agencies_id'),
            'agenciesCenters' => array(self::HAS_MANY, 'AgenciesCenters', 'agencies_id'),
            'agenciesEvents' => array(self::HAS_MANY, 'AgenciesEvents', 'agencies_id'),
            'agenciesHearingTvs' => array(self::HAS_MANY, 'AgenciesHearingTv', 'agencies_id'),
            'agenciesNews' => array(self::HAS_MANY, 'AgenciesNews', 'agencies_id'),
            'agenciesSpeechTherapists' => array(self::HAS_MANY, 'AgenciesSpeechTherapists', 'agencies_id'),
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
			'corporate_name_2' => Yii::t('global', 'Corporate Name 2'),
			'type' => Yii::t('global', 'Type'),
			'legal_status' => Yii::t('global', 'Legal Status'),
			'advertisers' => Yii::t('global', 'Advertiser'),
			'logo' => Yii::t('global', 'Logo'),
			'service' => Yii::t('global', 'Service'),
			'address_id' => Yii::t('global', 'Address Identification'),
			'address' => Yii::t('global', 'Address'),
			'additional_address' => Yii::t('global', 'Additional Address'),
			'city' => Yii::t('global', 'City'),
			'country' => Yii::t('global', 'Country'),
			'zip' => Yii::t('global', 'Zip'),
			'po_box' => Yii::t('global', 'Po Box'),
			'zip_cedex' => Yii::t('global', 'Zip Cedex'),
			'city_cedex' => Yii::t('global', 'City Cedex'),
			'phone' => Yii::t('global', 'Phone'),
			'phone_2' => Yii::t('global', 'Phone 2'),
			'fax' => Yii::t('global', 'Fax'),
			'email_1' => Yii::t('global', 'Email 1'),
			'email_2' => Yii::t('global', 'Email 2'),
			'email_3' => Yii::t('global', 'Email 3'),
			'grip' => Yii::t('global', 'Grip'),
			'description' => Yii::t('global', 'Description'),
			'description_2' => Yii::t('global', 'Description 2'),
			'publishing' => Yii::t('global', 'Publishing'),
			'website' => Yii::t('global', 'Website'),
			'website_2' => Yii::t('global', 'Website 2'),
			'email' => Yii::t('global', 'Email'),
			'address_2' => Yii::t('global', 'Address 2'),
			'additional_address_2' => Yii::t('global', 'Additional Address 2'),
			'city_2' => Yii::t('global', 'City 2'),
			'zip_2' => Yii::t('global', 'Zip 2'),
			'country_2' => Yii::t('global', 'Country 2'),
			'po_box_cedex_2' => Yii::t('global', 'Po Box Cedex 2'),
            'zip_cedex_2' => Yii::t('global', 'Zip Cedex 2'),
            'city_cedex_2' => Yii::t('global', 'City Cedex 2'),
            'tel_1' => Yii::t('global', 'Tel 1'),
            'tel_2' => Yii::t('global', 'Tel 2'),
			'fax_2' => Yii::t('global', 'Fax 2'),
			'image' => Yii::t('global', 'Photos'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
            'department' => Yii::t('global', 'Department'),
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
        $criteria->together =true;
        $criteria->with     = array('type0', 'department0');

		$criteria->compare('id',$this->id);
		$criteria->compare('corporate_name',$this->corporate_name,true);
		$criteria->compare('corporate_name_2',$this->corporate_name_2,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('legal_status',$this->legal_status,true);
		$criteria->compare('advertisers',$this->advertisers);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('service',$this->service,true);
		$criteria->compare('address_id',$this->address_id,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('additional_address',$this->additional_address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('zip_cedex',$this->zip_cedex,true);
		$criteria->compare('city_cedex',$this->city_cedex,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email_1',$this->email_1,true);
		$criteria->compare('email_2',$this->email_2,true);
		$criteria->compare('email_3',$this->email_3,true);
		$criteria->compare('grip',$this->grip,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('description_2',$this->description_2,true);
		$criteria->compare('publishing',$this->publishing,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('website_2',$this->website_2,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('additional_address_2',$this->additional_address_2,true);
		$criteria->compare('city_2',$this->city_2,true);
		$criteria->compare('zip_2',$this->zip_2,true);
		$criteria->compare('country_2',$this->country_2);
		$criteria->compare('po_box_cedex_2',$this->po_box_cedex_2,true);
        $criteria->compare('zip_cedex_2',$this->zip_cedex_2,true);
		$criteria->compare('city_cedex_2',$this->city_cedex_2,true);
        $criteria->compare('tel_1',$this->tel_1,true);
        $criteria->compare('tel_2',$this->tel_2,true);
		$criteria->compare('fax_2',$this->fax_2,true);
		$criteria->compare('image',$this->image,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);
        $criteria->compare('department',$this->department);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
		));
	}
    public function getStatus( $status ){
        $name = Yii::t('global','No');
        if( $status == self::STATUS_YES )
            $name = Yii::t('global','Yes');
        return $name;
    }

    function showAdminImageNew( $image ){
        $image = ($image != '')?$image:'no_image.gif';
        return '<a class="fancybox" href="/uploads/agencies/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/agencies/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'corporate_name',
        ));
        foreach($models as $model){
            $arr[$model->id]['corporate_name']=$model->corporate_name;
        }
    }

    function getAgenciesNewsId(){
        if ($this->id){
            $models = AgenciesNews::model()->findAllByAttributes(array('agencies_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->news_id;

            return $arr;
        }
        return array();
    }

    function getAgenciesNews($id){
        $catProducts = AgenciesNews::model()->findAllByAttributes(array('agencies_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view/?id='.$catProduct['news']['id']).">".$catProduct['news']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getAgenciesArticlesId(){
        if ($this->id){
            $models = AgenciesArticles::model()->findAllByAttributes(array('agencies_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->product_id;

            return $arr;
        }
        return array();
    }

    function getAgenciesArticles($id){
        $catProducts = AgenciesArticles::model()->findAllByAttributes(array('agencies_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view/?id='.$catProduct['product']['id']).">".$catProduct['product']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getAgenciesVideoId(){
        if ($this->id){
            $models = AgenciesHearingTv::model()->findAllByAttributes(array('agencies_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    function getAgenciesVideo($id){
        $catProducts = AgenciesHearingTv::model()->findAllByAttributes(array('agencies_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view/?id='.$catProduct['video']['id']).">".$catProduct['video']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getAgenciesEventsId(){
        if ($this->id){
            $models = AgenciesEvents::model()->findAllByAttributes(array('agencies_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->event_id;

            return $arr;
        }
        return array();
    }

    function getAgenciesEvents($id){
        $catProducts = AgenciesEvents::model()->findAllByAttributes(array('agencies_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/events/view/?id='.$catProduct['event']['id']).">".$catProduct['event']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getAgenciesCentersId(){
        if ($this->id){
            $models = AgenciesCenters::model()->findAllByAttributes(array('agencies_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->center_id;

            return $arr;
        }
        return array();
    }

    function getAgenciesCenters($id){
        $catProducts = AgenciesCenters::model()->findAllByAttributes(array('agencies_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view/?id='.$catProduct['center']['id']).">".$catProduct['center']['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getAgenciesSpeechTherapistId(){
        if ($this->id){
            $models = AgenciesSpeechTherapists::model()->findAllByAttributes(array('agencies_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->speech_therapist_id;

            return $arr;
        }
        return array();
    }

    function getAgenciesSpeechTherapist($id){
        $catProducts = AgenciesSpeechTherapists::model()->findAllByAttributes(array('agencies_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/speechTherapist/view/?id='.$catProduct['speechTherapist']['id']).">".$catProduct['speechTherapist']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }



}