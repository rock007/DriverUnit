<?php

/**
 * This is the model class for table "line".
 *
 * The followings are the available columns in table 'line':
 * @property integer $id
 * @property string $name
 * @property string $startAddress
 * @property string $endAddress
 * @property integer $interval
 * @property string $des
 * @property string $createDt
 * @property string $spot
 * @property string $startDate
 * @property string $endDate
 */
class Line extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Line the static model class
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
		return 'line';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('interval', 'numerical', 'integerOnly'=>true),
			array('name, startAddress, endAddress', 'length', 'max'=>20),
			array('des', 'length', 'max'=>255),
			array('spot', 'length', 'max'=>1024),
			array('startDate, endDate', 'length', 'max'=>8),
			array('createDt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, startAddress, endAddress, interval, des, createDt, spot, startDate, endDate', 'safe', 'on'=>'search'),
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
			'startAddress' => 'Start Address',
			'endAddress' => 'End Address',
			'interval' => 'Interval',
			'des' => 'Des',
			'createDt' => 'Create Dt',
			'spot' => 'Spot',
			'startDate' => 'Start Date',
			'endDate' => 'End Date',
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
		$criteria->compare('startAddress',$this->startAddress,true);
		$criteria->compare('endAddress',$this->endAddress,true);
		$criteria->compare('interval',$this->interval);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('createDt',$this->createDt,true);
		$criteria->compare('spot',$this->spot,true);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('endDate',$this->endDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}