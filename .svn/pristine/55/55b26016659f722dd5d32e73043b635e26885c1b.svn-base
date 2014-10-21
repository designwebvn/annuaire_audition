<?php

/**
 * This is the model class for table "users_account".
 *
 * The followings are the available columns in table 'users_account':
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property integer $function
 * @property string $phone_contact
 * @property string $email_contact
 * @property string $email
 * @property string $login
 * @property string $password
 * @property integer $enable
 * @property string $observation
 * @property string $name_contact_2
 * @property string $last_name_contact_2
 * @property string $function_contact_2
 * @property string $phone_contact_2
 * @property string $email_contact_2
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property UsersModule $function0
 */
class UsersAccount extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UsersAccount the static model class
	 */
    public $name_function;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_account';
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
			array('email, login, password, enable', 'required'),
            array('email, email_contact, email_contact_2','email'),
            array('phone_contact, phone_contact_2', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
			array('function, enable', 'numerical', 'integerOnly'=>true),
			array('name, last_name, observation, login', 'length', 'max'=>255),
			array('phone_contact, email_contact', 'length', 'max'=>100),
			array('email, password, name_contact_2, last_name_contact_2, function_contact_2, phone_contact_2, email_contact_2', 'length', 'max'=>150),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, last_name, function, phone_contact, email_contact, email, login, password, enable, observation, name_contact_2, last_name_contact_2, function_contact_2, phone_contact_2, email_contact_2, created, updated, name_function', 'safe', 'on'=>'search'),
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
			'function0' => array(self::BELONGS_TO, 'UsersModule', 'function'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'name' => Yii::t('global', 'First Name'),
			'last_name' => Yii::t('global', 'Last Name'),
			'function' => Yii::t('global', 'Function'),
			'phone_contact' => Yii::t('global', 'Phone Contact'),
			'email_contact' => Yii::t('global', 'Email Contact'),
			'email' => Yii::t('global', 'Email'),
			'login' => Yii::t('global', 'Login'),
			'password' => Yii::t('global', 'Password'),
			'enable' => Yii::t('global', 'Enable'),
			'observation' => Yii::t('global', 'Observation'),
			'name_contact_2' => Yii::t('global', 'First Name Contact 2'),
			'last_name_contact_2' => Yii::t('global', 'Last Name Contact 2'),
			'function_contact_2' => Yii::t('global', 'Function Contact 2'),
			'phone_contact_2' => Yii::t('global', 'Phone Contact 2'),
			'email_contact_2' => Yii::t('global', 'Email Contact 2'),
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
        $criteria->with     = array('function0');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('function',$this->function);
		$criteria->compare('phone_contact',$this->phone_contact,true);
		$criteria->compare('email_contact',$this->email_contact,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('enable',$this->enable);
		$criteria->compare('observation',$this->observation,true);
		$criteria->compare('name_contact_2',$this->name_contact_2,true);
		$criteria->compare('last_name_contact_2',$this->last_name_contact_2,true);
		$criteria->compare('function_contact_2',$this->function_contact_2,true);
		$criteria->compare('phone_contact_2',$this->phone_contact_2,true);
		$criteria->compare('email_contact_2',$this->email_contact_2,true);
        $criteria->compare('function0.name',$this->name_function,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'name_function'=>array(
                        'asc'=>'function0.name',
                        'desc'=>'function0.name DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    public function hashPassword( $password, $salt )
    {
        return sha1( md5('salt') . $password );
    }

    public function generatePassword($minLength=5, $maxLength=10)
    {
        $length=rand($minLength,$maxLength);

        $letters='bcdfghjklmnpqrstvwxyz';
        $vowels='aeiou';
        $code='';
        for($i=0;$i<$length;++$i)
        {
            if($i%2 && rand(0,10)>2 || !($i%2) && rand(0,10)>9)
                $code.=$vowels[rand(0,4)];
            else
                $code.=$letters[rand(0,20)];
        }

        return $code;
    }

    function getUser( $id ){
        $result = UsersAccount::model()->find(array(
                'select'=>'login',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['login'];
    }
    public function getEmails($id){
        $result = UsersAccount::model()->find(array(
                'select'=>'email',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['email'];
    }

    public function getNameFunction( $id ){
        $result = UsersModule::model()->find(array(
                'select'=>'name',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['name'];
    }

}