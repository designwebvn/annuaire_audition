<?php

/**
 * This is the model class for table "contact_box".
 *
 * The followings are the available columns in table 'contact_box':
 * @property integer $id
 * @property integer $user_id
 * @property integer $common_id
 * @property string $type
 * @property string $last_name
 * @property string $first_name
 * @property string $Function
 * @property string $tel_contact_1
 * @property string $email_contact_1
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property string $observation
 * @property string $last_name_contact_2
 * @property string $first_name_contact_2
 * @property string $function_contact_2
 * @property string $tel_contact_2
 * @property string $email_contact_2
 * @property string $created
 * @property string $updated
 */
class ContactBox extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContactBox the static model class
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
		return 'contact_box';
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
			array('email, username, password', 'required'),
			array('user_id, common_id, status', 'numerical', 'integerOnly'=>true),
			array('type, last_name, first_name, Function, tel_contact_1, email_contact_1, email, username, password, last_name_contact_2, first_name_contact_2, function_contact_2, tel_contact_2, email_contact_2', 'length', 'max'=>255),
			array('observation, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, common_id, type, last_name, first_name, Function, tel_contact_1, email_contact_1, email, username, password, status, observation, last_name_contact_2, first_name_contact_2, function_contact_2, tel_contact_2, email_contact_2, created, updated', 'safe', 'on'=>'search'),
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
			'user_id' => Yii::t('global', 'User'),
			'common_id' => Yii::t('global', 'Common'),
			'type' => Yii::t('global', 'Type'),
			'last_name' => Yii::t('global', 'Last Name'),
			'first_name' => Yii::t('global', 'First Name'),
			'Function' => Yii::t('global', 'Function'),
			'tel_contact_1' => Yii::t('global', 'Tel Contact 1'),
			'email_contact_1' => Yii::t('global', 'Email Contact 1'),
			'email' => Yii::t('global', 'Email'),
			'username' => Yii::t('global', 'Username'),
			'password' => Yii::t('global', 'Password'),
			'status' => Yii::t('global', 'Status'),
			'observation' => Yii::t('global', 'Observation'),
			'last_name_contact_2' => Yii::t('global', 'Last Name Contact 2'),
			'first_name_contact_2' => Yii::t('global', 'First Name Contact 2'),
			'function_contact_2' => Yii::t('global', 'Function Contact 2'),
			'tel_contact_2' => Yii::t('global', 'Tel Contact 2'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('common_id',$this->common_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('Function',$this->Function,true);
		$criteria->compare('tel_contact_1',$this->tel_contact_1,true);
		$criteria->compare('email_contact_1',$this->email_contact_1,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('observation',$this->observation,true);
		$criteria->compare('last_name_contact_2',$this->last_name_contact_2,true);
		$criteria->compare('first_name_contact_2',$this->first_name_contact_2,true);
		$criteria->compare('function_contact_2',$this->function_contact_2,true);
		$criteria->compare('tel_contact_2',$this->tel_contact_2,true);
		$criteria->compare('email_contact_2',$this->email_contact_2,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getIdContactBox( $user_id, $common_id, $type ){
        $result = self::model()->find( array('condition'=>'user_id ='.$user_id.' AND common_id ='.$common_id.' AND type ='.$type ) );
        return $result->id;
    }

    public function searchNew( $user_id, $common_id, $type )
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('user_id',$user_id);
        $criteria->compare('common_id',$common_id);
        $criteria->compare('type',$type);
        $criteria->compare('last_name',$this->last_name,true);
        $criteria->compare('first_name',$this->first_name,true);
        $criteria->compare('Function',$this->Function,true);
        $criteria->compare('tel_contact_1',$this->tel_contact_1,true);
        $criteria->compare('email_contact_1',$this->email_contact_1,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('observation',$this->observation,true);
        $criteria->compare('last_name_contact_2',$this->last_name_contact_2,true);
        $criteria->compare('first_name_contact_2',$this->first_name_contact_2,true);
        $criteria->compare('function_contact_2',$this->function_contact_2,true);
        $criteria->compare('tel_contact_2',$this->tel_contact_2,true);
        $criteria->compare('email_contact_2',$this->email_contact_2,true);
        $criteria->compare('created',$this->created,true);
        $criteria->compare('updated',$this->updated,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

}