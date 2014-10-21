<?php

/**
 * This is the model class for table "practices".
 *
 * The followings are the available columns in table 'practices':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $additional_address
 * @property string $po_box
 * @property string $zip_cedex
 * @property string $city_cedex
 * @property string $zip
 * @property string $city
 * @property string $phone
 * @property string $phone_2
 * @property string $fax
 * @property string $email
 * @property string $description
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property PracticeSpeechTherapists[] $practiceSpeechTherapists
 */
class Practices extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Practices the static model class
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
		return 'practices';
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
			array('address, zip, city', 'required'),
            array('email','email'),
            array('phone, phone_2, fax', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
			array('name, address, additional_address, description', 'length', 'max'=>255),
			array('po_box, zip_cedex, city_cedex, zip, city, phone, phone_2, fax, email', 'length', 'max'=>150),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, additional_address, po_box, zip_cedex, city_cedex, zip, city, phone, phone_2, fax, email, description, created, updated', 'safe', 'on'=>'search'),
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
            'practiceSpeechTherapists' => array(self::HAS_MANY, 'PracticeSpeechTherapists', 'practice_id'),
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
			'additional_address' => Yii::t('global', 'Additional Address'),
			'po_box' => Yii::t('global', 'Po Box'),
			'zip_cedex' => Yii::t('global', 'Zip Cedex'),
			'city_cedex' => Yii::t('global', 'City Cedex'),
			'zip' => Yii::t('global', 'Zip'),
			'city' => Yii::t('global', 'City'),
			'phone' => Yii::t('global', 'Phone'),
			'phone_2' => Yii::t('global', 'Phone 2'),
			'fax' => Yii::t('global', 'Fax'),
			'email' => Yii::t('global', 'Email'),
			'description' => Yii::t('global', 'Description'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
		);
	}

    function getTree(&$arr, $parent_id = 0){
        $models=self::model()->findAll(array(
            'order'=>'name',
        ));
        foreach($models as $model){
            $arr[$model->id]['name']=$model->name;
            // self::getTree($arr[$model->id]['childs'], $model->id);
        }
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
		$criteria->compare('additional_address',$this->additional_address,true);
		$criteria->compare('po_box',$this->po_box,true);
		$criteria->compare('zip_cedex',$this->zip_cedex,true);
		$criteria->compare('city_cedex',$this->city_cedex,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('description',$this->description,true);
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

    function getPracticesSpeechTherapistId(){
        if ($this->id){
            $models = PracticeSpeechTherapists::model()->findAllByAttributes(array('practice_id' => $this->id));
            $arr = array();
            foreach ($models as $model)
                $arr[] = $model->speech_therapists_id;

            return $arr;
        }
        return array();
    }

    function getPracticesSpeechTherapist($id){
        $catProducts = PracticeSpeechTherapists::model()->findAllByAttributes(array('practice_id' => $id));
        $listCatProduct ="";
        foreach($catProducts as $catProduct){
            $listCatProduct .= "<label class='catProduct'> <a href=".Yii::app()->createUrl('admin/speechTherapist/view/?id='.$catProduct['speechTherapists']['id']).">".$catProduct['speechTherapists']['name']."</a></label>";
        }
        return $listCatProduct;
    }

}