<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property integer $mtype
 * @property string $refId
 * @property integer $star
 * @property string $remarks
 * @property string $createDt
 * @property string $who
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
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
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mtype, star', 'numerical', 'integerOnly'=>true),
			array('refId', 'length', 'max'=>20),
			array('remarks, who', 'length', 'max'=>255),
			array('createDt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mtype, refId, star, remarks, createDt, who', 'safe', 'on'=>'search'),
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
			'mtype' => 'Mtype',
			'refId' => 'Ref',
			'star' => 'Star',
			'remarks' => 'Remarks',
			'createDt' => 'Create Dt',
			'who' => 'Who',
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
		$criteria->compare('mtype',$this->mtype);
		$criteria->compare('refId',$this->refId,true);
		$criteria->compare('star',$this->star);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('createDt',$this->createDt,true);
		$criteria->compare('who',$this->who,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}