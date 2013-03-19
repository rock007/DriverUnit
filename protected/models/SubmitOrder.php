<?php

/**
 * This is the model class for table "submit_order".
 *
 * The followings are the available columns in table 'submit_order':
 * @property integer $id
 * @property string $uid
 * @property string $submit_Date
 * @property string $phoneNum
 * @property string $driverId
 * @property string $beginDate
 * @property string $endDate
 * @property string $status
 */
class SubmitOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubmitOrder the static model class
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
		return 'submit_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, phoneNum', 'length', 'max'=>20),
			array('driverId, status', 'length', 'max'=>255),
			array('beginDate, endDate', 'length', 'max'=>14),
			array('submit_Date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, submit_Date, phoneNum, driverId, beginDate, endDate, status', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'submit_Date' => 'Submit Date',
			'phoneNum' => 'Phone Num',
			'driverId' => 'Driver',
			'beginDate' => 'Begin Date',
			'endDate' => 'End Date',
			'status' => 'Status',
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
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('submit_Date',$this->submit_Date,true);
		$criteria->compare('phoneNum',$this->phoneNum,true);
		$criteria->compare('driverId',$this->driverId,true);
		$criteria->compare('beginDate',$this->beginDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}