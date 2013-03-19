<?php

/**
 * This is the model class for table "sms".
 *
 * The followings are the available columns in table 'sms':
 * @property integer $id
 * @property string $refId
 * @property string $sendTo
 * @property string $msg
 * @property string $replyMsg
 * @property string $replyDate
 * @property string $createDate
 * @property integer $mtype
 * @property string $result
 */
class Sms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sms the static model class
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
		return 'sms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mtype', 'numerical', 'integerOnly'=>true),
			array('refId', 'length', 'max'=>20),
			array('sendTo', 'length', 'max'=>1024),
			array('msg, replyMsg, replyDate, createDate', 'length', 'max'=>255),
			array('result', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, refId, sendTo, msg, replyMsg, replyDate, createDate, mtype, result', 'safe', 'on'=>'search'),
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
			'refId' => 'Ref',
			'sendTo' => 'Send To',
			'msg' => 'Msg',
			'replyMsg' => 'Reply Msg',
			'replyDate' => 'Reply Date',
			'createDate' => 'Create Date',
			'mtype' => 'Mtype',
			'result' => 'Result',
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
		$criteria->compare('refId',$this->refId,true);
		$criteria->compare('sendTo',$this->sendTo,true);
		$criteria->compare('msg',$this->msg,true);
		$criteria->compare('replyMsg',$this->replyMsg,true);
		$criteria->compare('replyDate',$this->replyDate,true);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('mtype',$this->mtype);
		$criteria->compare('result',$this->result,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}