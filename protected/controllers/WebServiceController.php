<?php
class WebServiceController extends Controller
{

	public function actionIndex()
	{
		echo CJSON::encode(array('val'=>'eeee '));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		echo " 出错了！".$error['message'];		
	}

	/**1.软件更新
	 接口关键字：CheckVersion
	 输入参数：当前版本号CurrentVersion（String）
	 输出参数：是否升级(Boolean)；升级URL地址ApkAddress（String）
	 ***/
	public function actionCheckVersion(){
				
		$curVer=$this->getNoEmpty('curVer');
		
		echo CJSON::encode(array('curVer'=>$curVer,'isNewVer'=>false,'apkUrl'=>'  '));
		
	}

	/**
	 2.注册
	 接口关键字：RegisterUser
	 输入参数：手机号码MobileNumber（String）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionRegisterUser(){

		$account = new Account();

			$account->phoneNum=$this->getNoEmpty('phoneNum');
			
			//检查是否已经存在
			$rec=Account::model()->findByPk( $account->phoneNum);
			
			if(count($rec)>0){
				
				echo CJSON::encode(new Response(false,'phoneNum is exist!',$account->phoneNum));	
				
				return;
			}
			
			$account->pwd=$this->getNoEmpty('pwd');
			$account->createDt=Date('Y-m-d H:i:s');
			$account->status=0;
			$account->regKey="";
			$account->lastLoginDt= Date('Y-m-d H:i:s');
			
            if($account->save())
            {
                echo CJSON::encode(new Response(true,'register action successfull',$account->phoneNum));	
            } else {
                echo CJSON::encode(new Response(false,'register action fail ',$account->phoneNum));	
            }
		

	}

	/**
	 3.登录
	 接口关键字：Login
	 输入参数：手机号码MobileNumber（String），密码Password(String)
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionLogin(){

		$phoneNum= $this->getNoEmpty('phoneNum');
		$pwd= $this->getNoEmpty('pwd');
		
		echo CJSON::encode(new Response(true,'login action successfull',$phoneNum));
		
	}
	/**
	 4.搜索
	 接口关键字：Search
	 输入参数：起始时间StartTime（Date），结束时间EndTime（Date），目的地Target（String），路线Line（String）（目的地和路线必填一个）
	 输出参数：JSON结果（司机ID，司机称呼，车型，星级评价，路线，驾龄，所在地）；多条记录或无记录
	 **/
	public function actionSearch(){
		
		

	}

	/**
	 5.司机详情
	 接口关键字：DriverDetail
	 输入参数：司机ID（Int）
	 输出参数：JSON结果（失败原因，司机称呼，电话，车型，路线，驾龄，所在地，星级评价，评价详情（多条或无记录），宣传图片地址（多条或无记录））
	 **/
	public function actionDriverDetail(){

			$criteria =new CDbCriteria(); 
			$id=$this->getNoEmpty('id');
						
			$criteria->compare("id", $id);
						
			$criteria->order=" id desc ";
			
			$devices=Driver::model()->findAll($criteria);

			echo CJSON::encode(new Records(sizeof($devices),$devices) );

	}

	/**
	 6.确认行程
	 接口关键字：SubmitOrder
	 输入参数：起始时间StartTime（Date），结束时间EndTime（Date），司机ID（Int）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionSubmitOrder(){

		$startTime=$this->getNoEmpty('startTime');//yyyyMMdd
		$endTime=$this->getNoEmpty('endTime');
		$driverId=$this->getNoEmpty('driverId');


		echo CJSON::encode(new Response(true,'SubmitOrder action successfull',""));

	}

	/**
	 7.个人信息修改
	 接口关键字：UpdateProfile
	 输入参数：姓名Name（String），昵称（String），性别Gender（Boolean），所在城市City（String）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionUpdateProfile(){

		$name=$this->getNoEmpty('name');
		$userName=$this->getNoEmpty('userName');
		$sex=$this->getNoEmpty('sex');
		$city=$this->getNoEmpty('city');
		
		echo CJSON::encode(new Response(true,'UpdateProfile action successfull',$name));		
	}

	/**
	 8.密码修改
	 接口关键字：ChangePwd
	 输入参数：手机号码MobileNumber（String），原密码OldPassword(String)，新密码NewPassword(String)，
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionChangePwd(){
		
		$phoneNum=$this->getNoEmpty('phoneNum');
		$oldPwd=$this->getNoEmpty('oldPwd');
		$newPwd=$this->getNoEmpty('newPwd');
				
		echo CJSON::encode(new Response(true,'ChangePwd action successfull',$phoneNum));	

	}

	/**
	 9.收藏
	 接口关键字：AddCollection
	 输入参数：司机ID（Int）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionAddCollection(){

			$Drivercollect = new Drivercollect();
            
			$Drivercollect->phoneNum=$this->getNoEmpty('phoneNum');
			$Drivercollect->driverId=$this->getNoEmpty('driverId');
			$Drivercollect->remarks=$this->getKey('remarks');
			$Drivercollect->createDt=Date('Y-m-d H:i:s');
			
            if($Drivercollect->save())
            {
                echo CJSON::encode(new Response(true,'AddCollection action successfull',""));	
            } else {
                echo CJSON::encode(new Response(false,'AddCollection action fail ',""));	
            }			
	}

	/**
	 10.收藏记录
	 接口关键字：CollectionHistory
	 输入参数：无
	 输出参数：JSON结果（司机ID，司机称呼，车型，星级评价，路线，驾龄，所在地）；多条记录或无记录
	 **/
	public function actionCollectionHistory(){

			$criteria =new CDbCriteria(); 
			$phoneNum=$this->getNoEmpty('phoneNum');
						
			$criteria->addCondition(" 'phoneNum'  ='".$phoneNum."' ");
						
			$criteria->order=" id desc ";
			
			$collections=Drivercollect::model()->findAll($criteria);

			echo CJSON::encode(new Records(sizeof($collections),$collections) );
	}

	/**
	 11.行程记录
	 接口关键字：OrderHistory
	 输入参数：无
	 输出参数：JSON结果（OrderID，订单状态，开始时间，结束时间，路线，司机ID，司机称呼）；多条记录或无记录；司机详情使用DriverDetail获取
	 **/
	public function actionOrderHistory(){

			$criteria =new CDbCriteria(); 
			$phoneNum=$this->getNoEmpty('phoneNum');
						
			$criteria->addCondition(" 'phoneNum'  ='".$phoneNum."' ");
						
			$criteria->order=" id desc ";
			
			$orders=Order::model()->findAll($criteria);

			echo CJSON::encode(new Records(sizeof($orders),$orders) );
	}

	/**
	 12.点评投诉
	 接口关键字：AddComments
	 输入参数：OrderID（Int），点评星级（Int），点评内容（String）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionAddComments(){

	 		$comment = new Comment();
            
	 		$comment->mtype=$this->getNoEmpty('mtype');
	 		$comment->refId=$this->getNoEmpty('refId');
	 		$comment->star=$this->getNoEmpty('star');
	 		$comment->remarks=$this->getKey('remarks');
	 		$comment->createDt=Date('Y-m-d H:i:s');
	 		
            if($comment->save())
            {
                echo CJSON::encode(new Response(true,'AddComments action successfull',""));	
            } else {
                echo CJSON::encode(new Response(false,'AddComments action fail ',""));	
            }
	}
	
	/*
	 * 获取评价
	 * */
	public function actionComments(){
	
			$criteria =new CDbCriteria(); 
			$refId=$this->getNoEmpty('refId');
			$mtype=$this->getNoEmpty('mtype');
			
			$criteria->addCondition(" 'refId'  ='".$refId."' ");
			$criteria->addCondition(" mtype =".$mtype);
			
			$criteria->order=" id asc ";
			
			$comments=Comment::model()->findAll($criteria);

			echo CJSON::encode(new Records(sizeof(comments),comments) );
	}	
	/**
	 13.获取所有路线和目的地
	 接口关键字：GetLine
	 输入参数：选择获取路线还是目的地（Int）
	 输出参数：JSON结果（路线或目的地名称）；多条记录
	 **/
	public function actionGetLine(){

		$lineArray=Line::model()->findAll();
		
		echo CJSON::encode(new Records(sizeof($lineArray),$lineArray) );
	}

	/**
	 14.查询服务器向用户通知信息，需程序定时查询
	 接口关键字：Notification
	 输入参数：查询起始ID(Int)，使用上次获取通知ID + 1值
	 输出参数：JSON结果（通知ID，通知内容String）；多条记录或无记录
	 **/
	public function actionNotification(){
		
			$criteria =new CDbCriteria(); 
			$phoneNum=$this->getNoEmpty('phoneNum');
			
			$criteria->addCondition(" 'to'  ='".$phoneNum."' ");
			$criteria->addCondition(" status =0 ");
			
			$criteria->order=" level desc ,id asc ";
			
			$msgList=Message::model()->findAll($criteria);

			echo CJSON::encode(new Records(sizeof($msgList),$msgList) );

	}
}
 