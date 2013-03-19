<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $id
 * @property string $name
 * @property string $userName
 * @property integer $sex
 * @property string $address
 * @property string $createDt
 * @property integer $vip
 * @property string $weixin
 * @property string $weixin_pwd
 * @property string $qq
 * @property string $weibo
 * @property string $weibo_pwd
 * @property string $email
 */
class Profile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profile the static model class
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
		return 'profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, sex, vip', 'numerical', 'integerOnly'=>true),
			array('name, userName, address', 'length', 'max'=>20),
			array('weixin, weixin_pwd, qq, weibo, weibo_pwd, email', 'length', 'max'=>255),
			array('createDt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, userName, sex, address, createDt, vip, weixin, weixin_pwd, qq, weibo, weibo_pwd, email', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'userName' => 'User Name',
			'sex' => 'Sex',
			'address' => 'Address',
			'createDt' => 'Create Dt',
			'vip' => 'Vip',
			'weixin' => 'Weixin',
			'weixin_pwd' => 'Weixin Pwd',
			'qq' => 'Qq',
			'weibo' => 'Weibo',
			'weibo_pwd' => 'Weibo Pwd',
			'email' => 'Email',
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
		$criteria->compare('userName',$this->userName,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('createDt',$this->createDt,true);
		$criteria->compare('vip',$this->vip);
		$criteria->compare('weixin',$this->weixin,true);
		$criteria->compare('weixin_pwd',$this->weixin_pwd,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('weibo',$this->weibo,true);
		$criteria->compare('weibo_pwd',$this->weibo_pwd,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}