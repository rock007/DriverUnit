<?php

/**
 * This is the model class for table "suppUser".
 *
 * The followings are the available columns in table 'suppUser':
 * @property integer $id
 * @property string $name
 * @property integer $sex
 * @property string $age
 * @property string $houseName
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $address4
 * @property string $address5
 * @property string $address6
 * @property string $address7
 * @property string $address8
 * @property string $address9
 */
class SuppUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuppUser the static model class
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
		return 'suppUser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sex', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('age, houseName, address1, address2, address3, address4, address5, address6, address7, address8, address9', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sex, age, houseName, address1, address2, address3, address4, address5, address6, address7, address8, address9', 'safe', 'on'=>'search'),
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
			'sex' => 'Sex',
			'age' => 'Age',
			'houseName' => 'House Name',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'address3' => 'Address3',
			'address4' => 'Address4',
			'address5' => 'Address5',
			'address6' => 'Address6',
			'address7' => 'Address7',
			'address8' => 'Address8',
			'address9' => 'Address9',
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
		$criteria->compare('sex',$this->sex);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('houseName',$this->houseName,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('address3',$this->address3,true);
		$criteria->compare('address4',$this->address4,true);
		$criteria->compare('address5',$this->address5,true);
		$criteria->compare('address6',$this->address6,true);
		$criteria->compare('address7',$this->address7,true);
		$criteria->compare('address8',$this->address8,true);
		$criteria->compare('address9',$this->address9,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}