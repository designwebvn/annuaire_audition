<?php

/**
 * This is the model class for table "professionals".
 *
 * The followings are the available columns in table 'professionals':
 * @property integer $id
 * @property string $name
 * @property string $first_name
 * @property string $title
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property integer $training_center
 * @property string $year_of_graduation
 * @property integer $profesionnal_de
 * @property string $additional_degree
 * @property string $image
 * @property string $link_professional_product
 * @property string $link_essay
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property ProfessionalArticles[] $professionalArticles
 * @property ProfessionalCenters[] $professionalCenters
 * @property TrainingCenters $trainingCenter
 * @property ProfessionalMemories[] $professionalMemories
 * @property ProfessionalSpecialEducationSchools[] $professionalSpecialEducationSchools
 * @property ProfessionalTrainingCenters[] $professionalTrainingCenters
 * @property ProfessionalAgencies[] $professionalAgencies
 *
 */
class Professionals extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Professionals the static model class
	 */
    public $center;
    const STATUS_ACTIVE = 1;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'professionals';
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
			array('name, title', 'required'),
            array('email','email'),
			array('training_center, profesionnal_de', 'numerical', 'integerOnly'=>true),
			array('name, first_name, address, additional_degree, link_professional_product, link_essay', 'length', 'max'=>255),
			array('title', 'length', 'max'=>15),
			array('email, city, zip, year_of_graduation', 'length', 'max'=>150),
			array('image', 'length', 'max'=>155),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, first_name, title, email, address, city, zip, training_center, year_of_graduation, profesionnal_de, additional_degree, image, link_professional_product, link_essay, created, updated, center', 'safe', 'on'=>'search'),
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
            'professionalArticles' => array(self::HAS_MANY, 'ProfessionalArticles', 'professional_id'),
            'professionalMemories' => array(self::HAS_MANY, 'ProfessionalMemories', 'professional_id'),
            'trainingCenter' => array(self::BELONGS_TO, 'TrainingCenters', 'training_center'),
            'professionalCenters' => array(self::HAS_MANY, 'ProfessionalCenters', 'professional_id'),
            'professionalAgencies' => array(self::HAS_MANY, 'ProfessionalAgencies', 'professional_id'),
            'professionalSpecialEducationSchools' => array(self::HAS_MANY, 'ProfessionalSpecialEducationSchools', 'professional_id'),
            'professionalTrainingCenters' => array(self::HAS_MANY, 'ProfessionalTrainingCenters', 'professional_id'),
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
			'first_name' => Yii::t('global', 'First Name'),
			'title' => Yii::t('global', 'Civility'),
			'email' => Yii::t('global', 'Email'),
			'address' => Yii::t('global', 'Address'),
			'city' => Yii::t('global', 'City'),
			'zip' => Yii::t('global', 'Zip'),
			'training_center' => Yii::t('global', 'Training Center'),
			'year_of_graduation' => Yii::t('global', 'Year Of Graduation'),
            'profesionnal_de' => Yii::t('global', 'Profesionnal De'),
			'additional_degree' => Yii::t('global', 'Additional Degree'),
			'image' => Yii::t('global', 'Image'),
			'link_professional_product' => Yii::t('global', 'Link to articles'),
			'link_essay' => Yii::t('global', 'Memory Study'),
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
        $criteria->with     = array('trainingCenter','professionalCenters.centers');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('training_center',$this->training_center);
		$criteria->compare('year_of_graduation',$this->year_of_graduation,true);
        $criteria->compare('profesionnal_de',$this->profesionnal_de);
		$criteria->compare('additional_degree',$this->additional_degree,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('link_professional_product',$this->link_professional_product,true);
		$criteria->compare('link_essay',$this->link_essay,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);
        $criteria->compare('centers.id',$this->center);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'center'=>array(
                        'asc'=>'organizers.name',
                        'desc'=>'organizers.name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    function showAdminImage(){
        $image = ($this->image!='')?$this->image:'no_image.gif';
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

    public function getCategoriesId(){
        if ($this->id){
            $models = ProfessionalCenters::model()->findAllByAttributes(array('professional_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->centers_id;

            return $arr;
        }
        return array();
    }

    function getProfessionalsCenter( $id ){
        $catEvent = ProfessionalCenters::model()->findAllByAttributes(array('professional_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/centers/view/?id='.$catProduct['centers']['id']).">".$catProduct['centers']['corporate_name']."</a></label>";
        }
        return $listCatProduct;
    }

    function getProfessionalsArticles( $id ){
        $catEvent = ProfessionalArticles::model()->findAllByAttributes(array('professional_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/articles/view/?id='.$catProduct['articles']['id']).">".$catProduct['articles']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getTree( &$arr ){
        $models=self::model()->findAll(array(
            'order'=>'name',
        ));
        foreach($models as $model){
            $arr[$model->id]['name']=$model->name;
        }
    }

    public function getIdProfessionalsArticles(){
        if ($this->id){
            $models = ProfessionalArticles::model()->findAllByAttributes(array('professional_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->articles_id;

            return $arr;
        }
        return array();
    }

    function  getStatus( $status ){
        return ( $status == self::STATUS_ACTIVE )?'Yes':'No';
    }

    public function getIdMemoriesStudy(){
        if ($this->id){
            $models = ProfessionalMemories::model()->findAllByAttributes(array('professional_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->memories_id;

            return $arr;
        }
        return array();
    }

    function getProfessionalsMemories( $id ){
        $catEvent = ProfessionalMemories::model()->findAllByAttributes(array('professional_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/memoriesStudy/view/?id='.$catProduct['memories']['id']).">".$catProduct['memories']['title']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    public function getProfessionalTrainingCentersId(){
        if ($this->id){
            $models = ProfessionalTrainingCenters::model()->findAllByAttributes(array('professional_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->training_centers_id;

            return $arr;
        }
        return array();
    }

    public function getProfessionalSpecialEducationSchoolsId(){
        if ($this->id){
            $models = ProfessionalSpecialEducationSchools::model()->findAllByAttributes(array('professional_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->special_education_schools_id;

            return $arr;
        }
        return array();
    }

    public function getProfessionalAgenciesId(){
        if ($this->id){
            $models = ProfessionalAgencies::model()->findAllByAttributes(array('professional_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->agencies_id;

            return $arr;
        }
        return array();
    }

    public function getProfessionalDegreesId(){
        if ($this->id){
            $models = ProfessionalDegrees::model()->findAllByAttributes(array('professional_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->degree_id;

            return $arr;
        }
        return array();
    }

    function getProfessionalTrainingCenters( $id ){
        $catEvent = ProfessionalTrainingCenters::model()->findAllByAttributes(array('professional_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/trainingCenters/view/?id='.$catProduct['trainingCenters']['id']).">".$catProduct['trainingCenters']['school_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getProfessionalSpecialEducationSchools( $id ){
        $catEvent = ProfessionalSpecialEducationSchools::model()->findAllByAttributes(array('professional_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/specialEducationSchools/view/?id='.$catProduct['specialEducationSchools']['id']).">".$catProduct['specialEducationSchools']['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getProfessionalAgencies( $id ){
        $catEvent = ProfessionalAgencies::model()->findAllByAttributes(array('professional_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/agencies/view/?id='.$catProduct['agencies']['id']).">".$catProduct['agencies']['corporate_name']."</a></label><br/>";
        }
        return $listCatProduct;
    }

    function getProfessionalDegrees( $id ){
        $catEvent = ProfessionalDegrees::model()->findAllByAttributes(array('professional_id' => $id));
        $listCatProduct ="";
        foreach($catEvent as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/degrees/view/?id='.$catProduct['degree']['id']).">".$catProduct['degree']['name']."</a></label><br/>";
        }
        return $listCatProduct;
    }


}