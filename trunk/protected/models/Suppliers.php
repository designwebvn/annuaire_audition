<?php

/**
 * This is the model class for table "suppliers".
 *
 * The followings are the available columns in table 'suppliers':
 * @property integer $id
 * @property string $corporate_name
 * @property string $corporate_name_2
 * @property string $legal_status
 * @property string $logo
 * @property integer $advertiser
 * @property integer $type
 * @property string $grip_ent
 * @property string $description_ent_1
 * @property string $description_ent_2
 * @property string $description_ent_3
 * @property string $grip_hearing_aids
 * @property string $description_hearing_aids_1
 * @property string $description_hearing_aids_2
 * @property string $description_hearing_aids_3
 * @property string $address_1
 * @property string $additional_address
 * @property string $additional_address_2
 * @property string $city_1
 * @property string $zip_1
 * @property string $po_box
 * @property string $zip_cedex_cp_cedex
 * @property string $city_cedex
 * @property integer $country
 * @property string $phone
 * @property string $phone_2
 * @property string $fax
 * @property string $fax_2
 * @property string $email_1
 * @property string $email_2
 * @property string $address_2
 * @property string $address_2_additional
 * @property string $address_2_additional_2
 * @property string $zip
 * @property string $city_2
 * @property string $zip_2
 * @property string $website
 * @property string $website_2
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property SupplierProducts[] $supplierProducts
 * @property SupplierBrains[] $supplierBrains
 * @property SupplierAnnoucements[] $supplierAnnoucements
 * @property SupplierArticles[] $supplierArticles
 * @property SupplierEvents[] $supplierEvents
 * @property SupplierHearingtv[] $supplierHearingtvs
 * @property SupplierNews[] $supplierNews
 */
class Suppliers extends CActiveRecord
{
	const STATUS_YES                = 1;
    const SUPPLIERS                 = 1;
    const CENTERS                   = 2;
    const PROFESSIONALS             = 3;
    const NETWORKS                  = 4;
    const EVENTS                    = 5;
    const DOCTORS                   = 6;
    const HOSPITAL                  = 7;
    const SERVICES                  = 8;
    const SPEECH_THERAPIST          = 9;
    const PRESS                     = 10;
    const AGENCIES                  = 11;
    const TRAININGCENTER            = 12;
    const SPECIAL_EDUCATION_SCHOOLS = 13;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Suppliers the static model class
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
		return 'suppliers';
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
			array('corporate_name, advertiser, type, address_1, city_1, zip_1, po_box', 'required'),
            array('email_1, email_2','email'),
            array('phone, phone_2, fax, fax_2', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
            array('website, website_2', 'url', 'defaultScheme' => 'http'),
			array('advertiser, type, country', 'numerical', 'integerOnly'=>true),
			array('corporate_name, logo, legal_status, corporate_name_2, grip_ent, description_ent_1, description_ent_2, description_ent_3, grip_hearing_aids, description_hearing_aids_1, description_hearing_aids_2, description_hearing_aids_3, address_1, additional_address, additional_address_2, city_1, zip_1, po_box, zip_cedex_cp_cedex, city_cedex, address_2, address_2_additional, address_2_additional_2, zip, city_2', 'length', 'max'=>255),
			array('phone, phone_2, fax, fax_2', 'length', 'max'=>100),
			array('email_1, email_2, zip_2, website, website_2', 'length', 'max'=>150),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, corporate_name, corporate_name_2, legal_status, logo, advertiser, type, grip_ent, description_ent_1, description_ent_2, description_ent_3, grip_hearing_aids, description_hearing_aids_1, description_hearing_aids_2, description_hearing_aids_3, address_1, additional_address, additional_address_2, city_1, zip_1, po_box, zip_cedex_cp_cedex, city_cedex, country, phone, phone_2, fax, fax_2, email_1, email_2, address_2, address_2_additional, address_2_additional_2, zip, city_2, zip_2, website, website_2, created, updated', 'safe', 'on'=>'search'),
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
			'supplierProducts' => array(self::HAS_MANY, 'SupplierProducts', 'supplier_id'),
            'supplierBrains' => array(self::HAS_MANY, 'SupplierBrains', 'supplier_id'),
            'supplierAnnoucements' => array(self::HAS_MANY,'SupplierAnnoucements', 'supplier_id'),
            'supplierArticles' => array(self::HAS_MANY,'SupplierArticles', 'supplier_id'),
            'supplierEvents' => array(self::HAS_MANY, 'SupplierEvents', 'supplier_id'),
            'supplierHearingtvs' => array(self::HAS_MANY, 'SupplierHearingtv', 'supplier_id'),
            'supplierNews' => array(self::HAS_MANY, 'SupplierNews', 'supplier_id'),
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
			'legal_status' => Yii::t('global', 'Legal Status'),
			'logo' => Yii::t('global', 'Logo'),
			'advertiser' => Yii::t('global', 'Advertiser'),
			'type' => Yii::t('global', 'Type'),
			'grip_ent' => Yii::t('global', 'Grip Ent'),
			'description_ent_1' => Yii::t('global', 'Description Ent 1'),
			'description_ent_2' => Yii::t('global', 'Description Ent 2'),
			'description_ent_3' => Yii::t('global', 'Description Ent 3'),
			'grip_hearing_aids' => Yii::t('global', 'Grip Hearing Aids'),
			'description_hearing_aids_1' => Yii::t('global', 'Description Hearing Aids 1'),
			'description_hearing_aids_2' => Yii::t('global', 'Description Hearing Aids 2'),
			'description_hearing_aids_3' => Yii::t('global', 'Description Hearing Aids 3'),
			'address_1' => Yii::t('global', 'Address 1'),
			'additional_address' => Yii::t('global', 'Additional Address'),
			'additional_address_2' => Yii::t('global', 'Additional Address 2'),
			'city_1' => Yii::t('global', 'City 1'),
			'zip_1' => Yii::t('global', 'Zip 1'),
			'po_box' => Yii::t('global', 'Po Box'),
			'zip_cedex_cp_cedex' => Yii::t('global', 'Zip Cedex'),
			'city_cedex' => Yii::t('global', 'City Cedex'),
			'country' => Yii::t('global', 'Country'),
			'phone' => Yii::t('global', 'Phone'),
			'phone_2' => Yii::t('global', 'Phone 2'),
			'fax' => Yii::t('global', 'Fax'),
			'fax_2' => Yii::t('global', 'Fax 2'),
			'email_1' => Yii::t('global', 'Email 1'),
			'email_2' => Yii::t('global', 'Email 2'),
			'address_2' => Yii::t('global', 'Address 2'),
			'address_2_additional' => Yii::t('global', 'Address 2 Additional'),
			'address_2_additional_2' => Yii::t('global', 'Address 2 Additional 2'),
			'zip' => Yii::t('global', 'Zip'),
			'city_2' => Yii::t('global', 'City 2'),
			'zip_2' => Yii::t('global', 'Zip 2'),
			'website' => Yii::t('global', 'Website'),
			'website_2' => Yii::t('global', 'Website 2'),
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
		$criteria->compare('corporate_name_2',$this->corporate_name_2,true);
		$criteria->compare('legal_status',$this->legal_status, true);
        $criteria->compare('logo',$this->logo,true);
		$criteria->compare('advertiser',$this->advertiser);
		$criteria->compare('type',$this->type);
		$criteria->compare('grip_ent',$this->grip_ent,true);
		$criteria->compare('description_ent_1',$this->description_ent_1,true);
		$criteria->compare('description_ent_2',$this->description_ent_2,true);
		$criteria->compare('description_ent_3',$this->description_ent_3,true);
		$criteria->compare('grip_hearing_aids',$this->grip_hearing_aids,true);
		$criteria->compare('description_hearing_aids_1',$this->description_hearing_aids_1,true);
		$criteria->compare('description_hearing_aids_2',$this->description_hearing_aids_2,true);
		$criteria->compare('description_hearing_aids_3',$this->description_hearing_aids_3,true);
		$criteria->compare('address_1',$this->address_1,true);
		$criteria->compare('additional_address',$this->additional_address,true);
		$criteria->compare('additional_address_2',$this->additional_address_2,true);
		$criteria->compare('city_1',$this->city_1,true);
		$criteria->compare('zip_1',$this->zip_1,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('zip_cedex_cp_cedex',$this->zip_cedex_cp_cedex,true);
		$criteria->compare('city_cedex',$this->city_cedex,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('fax_2',$this->fax_2,true);
		$criteria->compare('email_1',$this->email_1,true);
		$criteria->compare('email_2',$this->email_2,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('address_2_additional',$this->address_2_additional,true);
		$criteria->compare('address_2_additional_2',$this->address_2_additional_2,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('city_2',$this->city_2,true);
		$criteria->compare('zip_2',$this->zip_2,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('website_2',$this->website_2,true);
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

    public function getStatus( $status ){
        $name = Yii::t('global','No');
        if( $status == self::STATUS_YES )
            $name = Yii::t('global','Yes');
        return $name;
    }

    function showAdminImageNew( $image ){
        $image = ($image!='')?$image:'no_image.gif';
        return '<a class="fancybox" href="'.Yii::app()->params['homeUrl'].'/uploads/suppliers/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="'.Yii::app()->params['homeUrl'].'/uploads/suppliers/'.$image.'" style="height: 40px;"/>
				</a>';
    }

    function showAdminPdf( $pdf ){
        return '<a href="'.Yii::app()->params['homeUrl'].'/uploads/suppliers/'.$pdf.'" rel="group">'.$pdf.'</a>';
    }

    public function getIdSupplierBrains(){
        if ($this->id){
            $models = SupplierBrains::model()->findAllByAttributes(array('supplier_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->brains_id;

            return $arr;
        }
        return array();
    }

    function getSupplierBrands($id){
        $catProducts = SupplierBrains::model()->findAllByAttributes(array('supplier_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/brands/view/?id='.$catProduct['brains']['id']).">".$catProduct['brains']['name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getSupplierNewsId(){
        if ($this->id){
            $models = SupplierNews::model()->findAllByAttributes(array('supplier_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->news_id;

            return $arr;
        }
        return array();
    }

    function getSupplierNews($id){
        $catProducts = SupplierNews::model()->findAllByAttributes(array('supplier_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/news/view/?id='.$catProduct['news']['id']).">".$catProduct['news']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getSupplierArticlesId(){
        if ($this->id){
            $models = SupplierArticles::model()->findAllByAttributes(array('supplier_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->product_id;

            return $arr;
        }
        return array();
    }

    function getSupplierArticles($id){
        $catProducts = SupplierArticles::model()->findAllByAttributes(array('supplier_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view/?id='.$catProduct['product']['id']).">".$catProduct['product']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getSupplierHearingTvId(){
        if ($this->id){
            $models = SupplierHearingtv::model()->findAllByAttributes(array('supplier_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->video_id;

            return $arr;
        }
        return array();
    }

    function getSupplierHearingTv($id){
        $catProducts = SupplierHearingtv::model()->findAllByAttributes(array('supplier_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/videos/view/?id='.$catProduct['video']['id']).">".$catProduct['video']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getSupplierEventsId(){
        if ($this->id){
            $models = SupplierEvents::model()->findAllByAttributes(array('supplier_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->event_id;

            return $arr;
        }
        return array();
    }

    function getSupplierEvents($id){
        $catProducts = SupplierEvents::model()->findAllByAttributes(array('supplier_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/events/view/?id='.$catProduct['event']['id']).">".$catProduct['event']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getSupplierAnnoucementsId(){
        if ($this->id){
            $models = SupplierAnnoucements::model()->findAllByAttributes(array('supplier_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->annoucement_id;

            return $arr;
        }
        return array();
    }

    function getSupplierAnnoucements($id){
        $catProducts = SupplierAnnoucements::model()->findAllByAttributes(array('supplier_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/annoucements/view/?id='.$catProduct['annoucement']['id']).">".$catProduct['annoucement']['company']."</a></label><br/>";
        }
        return $listCatProduct;
    }


}