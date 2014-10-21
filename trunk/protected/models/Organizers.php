<?php

/**
 * This is the model class for table "organizers".
 *
 * The followings are the available columns in table 'organizers':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property string $phone_number
 * @property string $fax
 * @property string $email
 * @property string $website
 * @property string $logo
 * @property string $created
 * @property string $updated
 */
class Organizers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Organizers the static model class
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
		return 'organizers';
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
			array('name, address, city, zip, phone_number, fax, email, website, logo', 'length', 'max'=>255),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, city, zip, phone_number, fax, email, website, logo, created, updated', 'safe', 'on'=>'search'),
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
			'name' => Yii::t('global', 'Name'),
			'address' => Yii::t('global', 'Address'),
			'city' => Yii::t('global', 'City'),
			'zip' => Yii::t('global', 'Zip'),
			'phone_number' => Yii::t('global', 'Phone Number'),
			'fax' => Yii::t('global', 'Fax'),
			'email' => Yii::t('global', 'Email'),
			'website' => Yii::t('global', 'Website'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
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

    public  function showAdminImageNew( $logo ){
        return '<a class="fancybox" href="'.Yii::app()->params['homeUrl'].'/uploads/organizers/'.$logo.'" rel="group">
					<img class="img-polaroid fix_image_products" src="'.Yii::app()->params['homeUrl'].'/uploads/organizers/'.$logo.'" style="height: 40px;"/>
				</a>';
    }

    public function getAllOrganizers(){
        $allCategory = self::model()->findAll(array('order'=>'name asc'));
        $category = array();
        foreach($allCategory as $item) {
            $category[$item['id']]=$item['name'];
        }
        return $category;
    }

    function getTree(&$arr){
        $models=self::model()->findAll(array(
            'order'=>'name',
        ));
        foreach($models as $model){
            $arr[$model->id]['name']=$model->name;
        }
    }


}