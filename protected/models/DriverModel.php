<?php

/**
 * This is the model class for table "driverV2".
 *
 * The followings are the available columns in table 'driverV2':
 * @property integer $Id
 * @property string $driverName
 * @property string $secName
 * @property string $nation
 * @property string $tel1
 * @property string $tel2
 * @property string $tel3
 * @property integer $sex
 * @property string $carType
 * @property string $carID
 * @property integer $driverYear
 * @property integer $carSeat
 * @property integer $carYear
 * @property integer $carKm
 * @property string $province
 * @property string $address
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $carPic
 * @property string $driverID
 * @property string $carPass
 * @property string $carNum
 * @property string $carLevel
 * @property string $suppUser
 */
class DriverModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DriverModel the static model class
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
		return 'driverV2';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sex, driverYear, carSeat, carYear, carKm', 'numerical', 'integerOnly'=>true),
			array('driverName, secName, tel1, tel2, tel3, carType, carID, driverID, carPass, carNum', 'length', 'max'=>20),
			array('nation, carLevel', 'length', 'max'=>10),
			array('province', 'length', 'max'=>12),
			array('address, address1, address2, address3', 'length', 'max'=>512),
			array('carPic', 'length', 'max'=>200),
			array('suppUser', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, driverName, secName, nation, tel1, tel2, tel3, sex, carType, carID, driverYear, carSeat, carYear, carKm, province, address, address1, address2, address3, carPic, driverID, carPass, carNum, carLevel, suppUser', 'safe', 'on'=>'search'),
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
			'Id' => '司机ID',
			'driverName' => '姓名',
			'secName' => '昵称',
			'nation' => '民族',
			'tel1' => '联系电话1',
			'tel2' => '联系电话2',
			'tel3' => '联系电话3',
			'sex' => '性别',
			'carType' => '车型',
			'carID' => '车牌号',
			'driverYear' => '驾龄',
			'carSeat' => '座位数',
			'carYear' => '车辆行驶年限',
			'carKm' => '车辆公里数',
			'province' => '省份',
			'address' => '所在地',
			'address1' => '出发地1',
			'address2' => '出发地2',
			'address3' => '出发地3',
			'carPic' => '车辆照片',
			'driverID' => '驾照号码',
			'carPass' => '车辆行驶证号码',
			'carNum' => '车架号码',
			'carLevel' => '司机等级',
			'suppUser' => '推荐人',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('driverName',$this->driverName,true);
		$criteria->compare('secName',$this->secName,true);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('tel1',$this->tel1,true);
		$criteria->compare('tel2',$this->tel2,true);
		$criteria->compare('tel3',$this->tel3,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('carType',$this->carType,true);
		$criteria->compare('carID',$this->carID,true);
		$criteria->compare('driverYear',$this->driverYear);
		$criteria->compare('carSeat',$this->carSeat);
		$criteria->compare('carYear',$this->carYear);
		$criteria->compare('carKm',$this->carKm);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('address3',$this->address3,true);
		$criteria->compare('carPic',$this->carPic,true);
		$criteria->compare('driverID',$this->driverID,true);
		$criteria->compare('carPass',$this->carPass,true);
		$criteria->compare('carNum',$this->carNum,true);
		$criteria->compare('carLevel',$this->carLevel,true);
		$criteria->compare('suppUser',$this->suppUser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}