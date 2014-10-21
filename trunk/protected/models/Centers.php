<?php

/**
 * This is the model class for table "centers".
 *
 * The followings are the available columns in table 'centers':
 * @property integer $id
 * @property string $corporate_name
 * @property string $status
 * @property string $corporate_name_2
 * @property integer $advertiser
 * @property integer $categories
 * @property integer $networks
 * @property string $sign
 * @property string $purchase_center
 * @property string $address
 * @property string $additional_address
 * @property string $po_box
 * @property string $zip_cedex
 * @property string $city_cedex
 * @property string $city
 * @property string $zip
 * @property integer $country
 * @property string $phone
 * @property string $phone_2
 * @property string $fax
 * @property string $fax_2
 * @property string $email
 * @property string $email_2
 * @property string $email_3
 * @property string $website
 * @property string $website_2
 * @property string $grip
 * @property string $description
 * @property string $opening_hours
 * @property string $image
 * @property string $logo
 * @property string $note
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Networks $networks0
 * @property CentersCategory $centersCategory0
 * @property CenterAnnoucements[] $centerAnnoucements
 * @property CenterCat[] $centerCats
 * @property CenterHearingTv[] $centerHearingTvs
 * @property CenterNetworks[] $centerNetworks
 * @property CenterNews[] $centerNews
 * @property CenterOther[] $centerOthers
 *
 */
class Centers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Centers the static model class
	 */
    const STATUS_YES  = 1;
    public $nameCategory, $nameNetwork;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'centers';
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
			array('corporate_name, address, city, zip, country, advertiser', 'required'),
            array('email, email_2, email_3','email'),
            array('phone, phone_2, fax, fax_2', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
            array('website, website_2', 'url', 'defaultScheme' => 'http'),
			array('advertiser, categories, networks, country', 'numerical', 'integerOnly'=>true),
			array('corporate_name, status, corporate_name_2, sign, purchase_center, address, additional_address, grip, description, image, logo', 'length', 'max'=>255),
			array('po_box, zip_cedex, city_cedex, city, zip, phone, phone_2, fax, fax_2, email, email_2, email_3, website, website_2, opening_hours', 'length', 'max'=>150),
			array('note, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, corporate_name, status, corporate_name_2, advertiser, categories, networks, sign, purchase_center, address, additional_address, po_box, zip_cedex, city_cedex, city, zip, country, phone, phone_2, fax, fax_2, email, email_2, email_3, website, website_2, grip, description, opening_hours, image, logo, note, created, updated, nameCategory, nameNetwork', 'safe', 'on'=>'search'),
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
			'networks0' => array(self::BELONGS_TO, 'Networks', 'networks'),
            'centersCategory0' => array(self::BELONGS_TO, 'CentersCategory', 'categories'),
            'centerAnnoucements' => array(self::HAS_MANY, 'CenterAnnoucements', 'center_id'),
            'centerCats' => array(self::HAS_MANY, 'CenterCat', 'center_id'),
            'centerHearingTvs' => array(self::HAS_MANY, 'CenterHearingTv', 'center_id'),
            'centerNetworks' => array(self::HAS_MANY, 'CenterNetworks', 'center_id'),
            'centerNews' => array(self::HAS_MANY, 'CenterNews', 'center_id'),
            'centerOthers' => array(self::HAS_MANY, 'CenterOther', 'center_id'),
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
			'status' => Yii::t('global', 'Status'),
			'corporate_name_2' => Yii::t('global', 'Corporate Name 2'),
			'advertiser' => Yii::t('global', 'Advertiser'),
			'categories' => Yii::t('global', 'Categories'),
			'networks' => Yii::t('global', 'Networks'),
			'sign' => Yii::t('global', 'Sign'),
			'purchase_center' => Yii::t('global', 'Purchase Center'),
			'address' => Yii::t('global', 'Address'),
			'additional_address' => Yii::t('global', 'Additional Address'),
			'po_box' => Yii::t('global', 'Po Box'),
			'zip_cedex' => Yii::t('global', 'Zip Cedex'),
			'city_cedex' => Yii::t('global', 'City Cedex'),
			'city' => Yii::t('global', 'City'),
			'zip' => Yii::t('global', 'Zip'),
			'country' => Yii::t('global', 'Country'),
			'phone' => Yii::t('global', 'Phone'),
			'phone_2' => Yii::t('global', 'Phone 2'),
			'fax' => Yii::t('global', 'Fax'),
			'fax_2' => Yii::t('global', 'Fax 2'),
			'email' => Yii::t('global', 'Email'),
			'email_2' => Yii::t('global', 'Email 2'),
			'email_3' => Yii::t('global', 'Email 3'),
			'website' => Yii::t('global', 'Website'),
			'website_2' => Yii::t('global', 'Website 2'),
			'grip' => Yii::t('global', 'Grip'),
			'description' => Yii::t('global', 'Description'),
			'opening_hours' => Yii::t('global', 'Opening Hours'),
			'image' => Yii::t('global', 'Image'),
			'logo' => Yii::t('global', 'Logo'),
			'note' => Yii::t('global', 'Note'),
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
        $criteria->with = array('networks0','centersCategory0');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.corporate_name',$this->corporate_name,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('corporate_name_2',$this->corporate_name_2,true);
		$criteria->compare('t.advertiser',$this->advertiser);
		$criteria->compare('categories',$this->categories);
		$criteria->compare('networks',$this->networks);
		$criteria->compare('sign',$this->sign,true);
		$criteria->compare('purchase_center',$this->purchase_center,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('additional_address',$this->additional_address,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('zip_cedex',$this->zip_cedex,true);
		$criteria->compare('city_cedex',$this->city_cedex,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('fax_2',$this->fax_2,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('email_2',$this->email_2,true);
		$criteria->compare('email_3',$this->email_3,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('website_2',$this->website_2,true);
		$criteria->compare('grip',$this->grip,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('opening_hours',$this->opening_hours,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('note',$this->note,true);
        $criteria->compare('networks0.corporate_name',$this->nameNetwork,true);
        $criteria->compare('centersCategory0.name',$this->nameCategory,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'name_network'=>array(
                        'asc'=>'networks0.corporate_name',
                        'desc'=>'networks0.corporate_name DESC',
                    ),
                    'name_category'=>array(
                        'asc'=>'centersCategory0.name',
                        'desc'=>'centersCategory0.name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    function getStatusCenters( $status ){
        if($status==self::STATUS_YES)
            return Yii::t('global','Yes');
        return Yii::t('global','No');
    }

    function showAdminImage(){
        $image = ($this->image!='')?$this->image:'no_image.gif';
        return '<a class="fancybox" href="'.Yii::app()->params['homeUrl'].'/uploads/audios/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="'.Yii::app()->params['homeUrl'].'/uploads/audios/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function showAdminImageNew( $image ){
        $image = ($image!='')?$image:'no_image.gif';
        return '<a class="fancybox" href="'.Yii::app()->params['homeUrl'].'/uploads/audios/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="'.Yii::app()->params['homeUrl'].'/uploads/audios/'.$image.'" style="height: 40px;"/>
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

    function getCenterCategoriesId(){
        if ($this->id){
            $models = CenterCat::model()->findAllByAttributes(array('center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->category_id;

            return $arr;
        }
        return array();
    }

    function getCenterCategories( $id ){
        $catProducts = CenterCat::model()->findAllByAttributes(array('center_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centersCategory/view?id='.$catProduct['category']['id']).">".$catProduct['category']['name']."</a></label><br>";
        }
        return $listCatProduct;
    }

    function getCenterNetworksId(){
        if ($this->id){
            $models = CenterNetworks::model()->findAllByAttributes(array('center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->network_id;

            return $arr;
        }
        return array();
    }

    function getCenterNetworks( $id ){
        $catProducts = CenterNetworks::model()->findAllByAttributes(array('center_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/networks/view?id='.$catProduct['network']['id']).">".$catProduct['network']['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getCenterNewsId(){
        if ($this->id){
            $models = CenterNews::model()->findAllByAttributes(array('center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->news_id;

            return $arr;
        }
        return array();
    }

    function getCenterNews( $id ){
        $catProducts = CenterNews::model()->findAllByAttributes(array('center_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view?id='.$catProduct['news']['id']).">".$catProduct['news']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getCenterVideoId(){
        if ($this->id){
            $models = CenterHearingTv::model()->findAllByAttributes(array('center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    function getCenterVideo( $id ){
        $catProducts = CenterHearingTv::model()->findAllByAttributes(array('center_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view?id='.$catProduct['video']['id']).">".$catProduct['video']['title']."</a></label><br>";
        }
        return $listCatProduct;
    }

    function getCenterAnnouncementsId(){
        if ($this->id){
            $models = CenterAnnoucements::model()->findAllByAttributes(array('center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->annoucements_id;

            return $arr;
        }
        return array();
    }

    function getCenterAnnouncements( $id ){
        $catProducts = CenterAnnoucements::model()->findAllByAttributes(array('center_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/announcements/view?id='.$catProduct['annoucements']['id']).">".$catProduct['annoucements']['company']."</a></label><br>";
        }
        return $listCatProduct;
    }

    function getCentersId(){
        if ($this->id){
            $models = CenterOther::model()->findAllByAttributes(array('center_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->other_center_id;

            return $arr;
        }
        return array();
    }

    function getCenterOthers( $id ){
        $catProducts        = CenterOther::model()->findAllByAttributes(array('center_id' => $id));
        $id                 = array();
        foreach ( $catProducts as $key=>$val ){
            $id[$key] = $val['other_center_id'];
        }
        $ids = implode(',',$id);
        $ids = ($ids != '')?$ids:0;
        $listProduct        = Centers::model()->findAll('id IN ('.$ids.')');
        $listCatProduct     = "";
        foreach($listProduct as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view?id='.$catProduct['id']).">".$catProduct['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }


}