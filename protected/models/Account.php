<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property string $phoneNum
 * @property string $pwd
 * @property string $createDt
 * @property integer $status
 * @property string $regKey
 * @property string $lastLoginDt
 */
class Account extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
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
		return 'account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('phoneNum, pwd', 'length', 'max'=>20),
			array('regKey', 'length', 'max'=>255),
			array('createDt, lastLoginDt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('phoneNum, pwd, createDt, status, regKey, lastLoginDt', 'safe', 'on'=>'search'),
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
			'phoneNum' => 'Phone Num',
			'pwd' => 'Pwd',
			'createDt' => 'Create Dt',
			'status' => 'Status',
			'regKey' => 'Reg Key',
			'lastLoginDt' => 'Last Login Dt',
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

		$criteria->compare('phoneNum',$this->phoneNum,true);
		$criteria->compare('pwd',$this->pwd,true);
		$criteria->compare('createDt',$this->createDt,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('regKey',$this->regKey,true);
		$criteria->compare('lastLoginDt',$this->lastLoginDt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}