<?php
class WebserviceController extends Controller
{

	public function actionIndex()
	{
		$this->render('index',array('nav'=>array( 
												array('name'=>'CheckVersion','desc'=>'软件更新'),
												array('name'=>'RegisterUser','desc'=>'注册'),
												array('name'=>'RegistForMobile','desc'=>'手机注册'),
												
												array('name'=>'Login','desc'=>'登录'),
												array('name'=>'Search','desc'=>'搜索'),
												array('name'=>'SearchForLine','desc'=>'按路线搜索'),
												array('name'=>'SearchForAddress','desc'=>'按地点搜索'),
												
												array('name'=>'DriverDetail','desc'=>'司机详情'),
												array('name'=>'SubmitOrder','desc'=>'确认行程'),
												array('name'=>'UpdateProfile','desc'=>'个人信息修改'),
												
												array('name'=>'ChangePwd','desc'=>'密码修改'),
												
												array('name'=>'FindPwd','desc'=>'忘记密码'),
												
												
												array('name'=>'AddCollection','desc'=>'收藏'),
												array('name'=>'CollectionHistory','desc'=>'收藏记录'),
												array('name'=>'OrderHistory','desc'=>'行程记录'),
												array('name'=>'AddComments','desc'=>'点评投诉'),
												
												array('name'=>'Comments','desc'=>'获取评价'),
												array('name'=>'GetLine','desc'=>'获取所有路线'),
												array('name'=>'Notification','desc'=>'用户通知信息'),
												
												array('name'=>'UpdateNotification','desc'=>'更新用户通知信息状态'),
												
												array('name'=>'Feedback','desc'=>'用户反馈'),
												array('name'=>'Address','desc'=>'获取地点'),												
												
											)
									)
						);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		echo CJSON::encode(new Response(false,$error['message']));	
		//echo " 出错了！".$error['message'];		
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
				
				echo CJSON::encode(new Response(false,'该号码已经注册!'));	
				
				return;
			}
			
			$account->pwd=$this->getNoEmpty('pwd');
			$account->createDt=Date('Y-m-d H:i:s');
			$account->status=0;
			$account->regKey="";
			$account->lastLoginDt= Date('Y-m-d H:i:s');
			
            if($account->save())
            {
                echo CJSON::encode(new Response(true,'注册成功！'));	
            } else {
                echo CJSON::encode(new Response(false,'注册失败！ '));	
            }
	}
	
	public function actionRegistForMobile(){
	
			$account = new Account();

			$account->phoneNum=$this->getNoEmpty('phoneNum');
			
			//检查是否已经存在
			$rec=Account::model()->findByPk( $account->phoneNum);
			
			if(count($rec)>0){
				
				echo CJSON::encode(new Response(false,'该号码已经注册!'));	
				
				return;
			}
			
			$this->addUserLog($account->phoneNum, "actionRegistForMobile", "用户注册", "");
			
			$account->pwd=$this->mkRandCode();
			$account->createDt=Date('Y-m-d H:i:s');
			$account->status=0;
			$account->regKey="";
			$account->lastLoginDt= Date('Y-m-d H:i:s');
			
            if($account->save())
            {
            	//短信通知
            	$this->sendSms($account->phoneNum, "尊敬的".$account->phoneNum."，恭喜你注册成功，账号的密码为： ".$account->pwd,$account->phoneNum,1);
            	
                echo CJSON::encode(new Response(true,'注册操作成功！'));	
            } else {
                echo CJSON::encode(new Response(false,'注册失败！ '));	
            }
	}
	
	public function actionFindPwd(){
	
			$account = new Account();

			$account->phoneNum=$this->getNoEmpty('phoneNum');
			
			$this->addUserLog($account->phoneNum, "actionFindPwd", "用户找回密码", "");
			//检查是否已经存在
			$rec=Account::model()->findByPk( $account->phoneNum);
			
			if(count($rec)==0){
				
				echo CJSON::encode(new Response(false,'该号码未注册!'));	
				
				return;
			}
			
			$rec->pwd=$this->mkRandCode();
						
            if($rec->save())
            {
            	//短信通知
            	$this->sendSms($rec->pwd, "尊敬的".$account->phoneNum." 你的新密码为：".$rec->pwd.",请不要泄露给其他人！",$account->phoneNum,2);
            	
                echo CJSON::encode(new Response(true,'操作成功，请注意短信密码接收！'));	
            } else {
                echo CJSON::encode(new Response(false,'操作失败！ '));	
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
		
		$this->addUserLog($phoneNum, "actionLogin", "用户登录", $pwd);
		
		$criteria =new CDbCriteria(); 
		
		$criteria->addCondition("  phoneNum='". $phoneNum."'");
		$criteria->addCondition("  pwd='". $pwd."'");
		
		$accounts=Account::model()->findAll($criteria);
		
		if(count($accounts)>0){				
			
			echo CJSON::encode(new Response(true,'登录成功！'));
			
		}else{
			echo CJSON::encode(new Response(false,'登录失败，用户名密码不正确！'));
		}
	}
	/**
	 4.搜索
	 接口关键字：Search
	 输入参数：起始时间StartTime（Date），结束时间EndTime（Date），目的地Target（String），路线Line（String）（目的地和路线必填一个）
	 输出参数：JSON结果（司机ID，司机称呼，车型，星级评价，路线，驾龄，所在地）；多条记录或无记录
	 **/
	public function actionSearch(){
		
		echo "接口已经废弃！";
		return;
		
		$startDate=$this->getNoEmpty('startDate');
		$endDate=$this->getNoEmpty('endDate');
		$target=$this->getNoEmpty('target');
		
		$criteria =new CDbCriteria(); 
		 
		$criteria->addCondition(" startDate >='".$startDate."'");
		$criteria->addCondition(" endDate >='".$endDate."'");						
		$criteria->addSearchCondition('target', $target);
						
		$criteria->order=" id desc ";
			
		$Lines=Line::model()->findAll($criteria);

		echo CJSON::encode(new Records(sizeof($Lines),$Lines) );

	}
	
	/**
	 4.搜索
	 接口关键字：Search
	 输入参数：起始时间StartTime（Date），结束时间EndTime（Date），目的地Target（String），路线Line（String）（目的地和路线必填一个）
	 输出参数：JSON结果（司机ID，司机称呼，车型，星级评价，路线，驾龄，所在地）；多条记录或无记录
	 **/
	public function actionSearchForLine(){
		
		$phoneNum=$this->getNoEmpty('phoneNum');
		$startDate=$this->getNoEmpty('startDate');
		$endDate=$this->getNoEmpty('endDate');
		$line=$this->getNoEmpty('line');
		
		$db = Yii::app()->db; 
		
		$sql=" select a.Id,driverName,secName,nation,tel1,tel2,tel3,sex,carType,carID,driverYear,carSeat,carYear,carKm,province,
				address,address1,address2,address3,carPic,a.driverID,carPass,carNum,carLevel,suppUser
				from driverV2 a inner join driver_line b on a.id=b.driverId
				where  b.line=:line 
					and a.id not in(
    					select driverid from submit_order where beginDate > :startDate  and endDate < :endDate
				) ";		
		
		$results = $db->createCommand($sql)->query(array(  
 				 ':startDate' => $startDate,':endDate'=>$endDate,':line'=>$line,  
		));

		$jsonData=Array();
		
		foreach($results as $result){  
			
			$m=Array(
			'id'=>$result['Id'],
			//'driverName'=>$result['driverName'],
			'secName'=>$result['secName'],
			//'nation'=>$result['nation'],		
			//'tel1'=>$result['tel1'],			
			//'tel2'=>$result['tel2'],
			//'tel3'=>$result['tel3'],
			
			'sex'=>$result['sex'],
			'carType'=>$result['carType'],
			//'carID'=>$result['carID'],
			'driverYear'=>$result['driverYear'],
			'carSeat'=>$result['carSeat'],
			//'carYear'=>$result['carYear'],
			//'carKm'=>$result['carKm'],
			'province'=>$result['province'],
			
			//'address'=>$result['address'],
			//'address1'=>$result['address1'],
			//'address2'=>$result['address2'],
			//'address3'=>$result['address3'],
			//'carPic'=>$result['carPic'],
			
			//'driverID'=>$result['driverID'],
			//'carPass'=>$result['carPass'],
			//'carNum'=>$result['carNum'],
			'carLevel'=>$result['carLevel'],
			//'suppUser'=>$result['suppUser'],
			);
			
			array_push($jsonData,$m); 
		} 

		$this->addUserLog($phoneNum, "actionSearchForLine", "司机查询", $line);	
			
		echo CJSON::encode(new OutJson(true,'查询成功！',new Records(count($jsonData),$jsonData) ));
		Yii::app()->end();	
		
	}
	
	/**
	 4.搜索
	 接口关键字：Search
	 输入参数：起始时间StartTime（Date），结束时间EndTime（Date），目的地Target（String），路线Line（String）（目的地和路线必填一个）
	 输出参数：JSON结果（司机ID，司机称呼，车型，星级评价，路线，驾龄，所在地）；多条记录或无记录
	 **/
	public function actionSearchForAddress(){
		
		$phoneNum=$this->getNoEmpty('phoneNum');
		
		$startDate=$this->getNoEmpty('startDate');
		$endDate=$this->getNoEmpty('endDate');
		$address=$this->getNoEmpty('address');
		
		$db = Yii::app()->db; 
		
		$sql=" select Id,driverName,secName,nation,tel1,tel2,tel3,sex,carType,carID,driverYear,carSeat,carYear,carKm,province,
				address,address1,address2,address3,carPic,driverID,carPass,carNum,carLevel,suppUser
					from driverV2  where (address1 = :address or address2 = :address or address3 = :address )
						and id not in(
    						select driverid from submit_order where beginDate > :startDate and endDate < :endDate
				)";
		
		$results = $db->createCommand($sql)->query(array(  
 				 ':startDate' => $startDate,':endDate'=>$endDate,':address'=>$address,  
		));
		  
		$jsonData=Array();
		
		foreach($results as $result){  
			
			$m=Array(
			'id'=>$result['Id'],
			//'driverName'=>$result['driverName'],
			'secName'=>$result['secName'],
			//'nation'=>$result['nation'],		
			//'tel1'=>$result['tel1'],			
			//'tel2'=>$result['tel2'],
			//'tel3'=>$result['tel3'],
			
			'sex'=>$result['sex'],
			'carType'=>$result['carType'],
			//'carID'=>$result['carID'],
			'driverYear'=>$result['driverYear'],
			'carSeat'=>$result['carSeat'],
			//'carYear'=>$result['carYear'],
			//'carKm'=>$result['carKm'],
			'province'=>$result['province'],
			
			//'address'=>$result['address'],
			//'address1'=>$result['address1'],
			//'address2'=>$result['address2'],
			//'address3'=>$result['address3'],
			//'carPic'=>$result['carPic'],
			
			//'driverID'=>$result['driverID'],
			//'carPass'=>$result['carPass'],
			//'carNum'=>$result['carNum'],
			'carLevel'=>$result['carLevel'],
			//'suppUser'=>$result['suppUser'],
			
			);
			
			array_push($jsonData,$m); 
		} 

		$this->addUserLog($phoneNum, "actionSearchForAddress", "司机查询", $address);		
		//echo CJSON::encode($jsonData);
		
		echo CJSON::encode(new OutJson(true,'查询成功！',new Records(count($jsonData),$jsonData) ));
		
	}

	/**
	 * 所有地点
	 * */
	public function actionAddress(){
	
		//echo CJSON::encode(Array(Array('name'=>'上海'),Array('name'=>'北京'),Array('name'=>'杭州'),Array('name'=>'深圳')) );
		
		$criteria =new CDbCriteria(); 		 
		$criteria->order=" level desc ";
			
		$addresss=Address::model()->findAll($criteria);
		
		echo CJSON::encode(new OutJson(true,'查询成功！',new Records(sizeof($addresss),$addresss) ) );
		
	}
	/**
	 5.司机详情
	 接口关键字：DriverDetail
	 输入参数：司机ID（Int）
	 输出参数：JSON结果（失败原因，司机称呼，电话，车型，路线，驾龄，所在地，星级评价，评价详情（多条或无记录），宣传图片地址（多条或无记录））
	 **/
	public function actionDriverDetail(){
			
			$id=$this->getNoEmpty('id');
			$phoneNum=$this->getNoEmpty("phoneNum");
									
			$device=DriverV2::model()->findByPk($id);

			if($device!=null){			
				//记录操作
				$this->addUserLog($phoneNum, "actionDriverDetail", "司机详细查看", $id);				
			}			
			//限制查看次数
			$userLog= UserLog::model()->findAllBySql(" SELECT distinct params FROM `user_log` where phoneNum=:phoneNum and date(createDate)=CURDATE() ",array(':phoneNum'=>$phoneNum));
						
			if(sizeof($userLog)  > 5){
			
				echo CJSON::encode(new Response(false,"抱歉，你今天查询司机的次数已经超额！")  );
				return;	
			}
			
			//echo CJSON::encode($device);
			
			$m=Array(
				'id'=>$device->Id ,
				'driverName'=>$device->driverName,
				'secName'=>$device->secName,
				'nation'=>$device->nation,		
				'tel1'=>$device->tel1,			
				'tel2'=>$device->tel2,
				'tel3'=>$device->tel3,
			
				'sex'=>$device->sex,
				'carType'=>$device->carType,
				'carID'=>$device->carID,
				'driverYear'=>$device->driverYear,
				'carSeat'=>$device->carSeat,
				'carYear'=>$device->carYear,
				'carKm'=>$device->carKm,
				'province'=>$device->province,
			
				'address'=>$device->address,
				'address1'=>$device->address1,
				'address2'=>$device->address2,
				'address3'=>$device->address3,
				'carPic'=>$device->carPic,
			
				//'driverID'=>$result['driverID'],
				//'carPass'=>$result['carPass'],
				//'carNum'=>$device->carNum,
				'carLevel'=>$device->carLevel,
				//'suppUser'=>$result['suppUser'],
			);
			
			echo CJSON::encode(new OutJson(true,"操作成功",$m)  );			
	}

	/**
	 6.确认行程
	 接口关键字：SubmitOrder
	 输入参数：起始时间StartTime（Date），结束时间EndTime（Date），司机ID（Int）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionSubmitOrder(){

			//短信通知
			$order = new SubmitOrder();
            
			$order->uid=Date('YmdHis');
			$order->submit_Date=Date('Y-m-d H:i:s');
			
			$order->phoneNum=$this->getNoEmpty('phoneNum');
			$order->driverId=$this->getNoEmpty('driverId');
			$order->beginDate=$this->getNoEmpty('beginDate');
			$order->endDate=$this->getNoEmpty('endDate');
			
			$order->status=0;
			//$order->remarks=$this->getKey('remarks');
			
            if($order->save())
            {
                echo CJSON::encode(new Response(true,'订单提交成功！'));	
            } else {
                echo CJSON::encode(new Response(false,'订单提交失败！ '));	
            }		

	}

	/**
	 7.个人信息修改
	 接口关键字：UpdateProfile
	 输入参数：姓名Name（String），昵称（String），性别Gender（Boolean），所在城市City（String）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionUpdateProfile(){
		
		$phoneNum=$this->getNoEmpty("phoneNum");
		
		$rec=Profile::model()->findByPk($phoneNum);

		if($rec==null){
			
			$rec=new Profile();
		}
		
		$rec->id=$this->getNoEmpty("phoneNum");
		$rec->name=$this->getNoEmpty("name");
		$rec->userName=$this->getNoEmpty("userName");
		$rec->sex=$this->getNoEmpty("sex");
		$rec->address=$this->getKey("address");
		$rec->createDt= Date('Y-m-d H:i:s');
		//$rec->vip=$this->getNoEmpty("vip");
		$rec->weixin=$this->getKey("weixin");
		$rec->weixin_pwd=$this->getKey("weixin_pwd");
		$rec->qq=$this->getKey("qq");
		$rec->weibo=$this->getKey("weibo");
		$rec->weibo_pwd=$this->getKey("weibo_pwd");
		$rec->email=$this->getKey("email");		

		if($rec->save())
		{
			$this->addUserLog($phoneNum, "actionUpdateProfile", "个人信息修改", "");		
			
			echo CJSON::encode(new Response(true,'个人信息修改成功！'));
		} else {
			echo CJSON::encode(new Response(false,'个人信息修改失败！ '));
		}
				
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

		$rec=Account::model()->findByPk($phoneNum);

		if($rec==null){
			
			echo CJSON::encode(new Response(false,'号码不存在，请注册!'));
			return ;
		}
		
		if($rec->pwd!=$oldPwd){

			//原来密码不正确
			echo CJSON::encode(new Response(false,'旧密码不正确！'));
			return ;
		}

		$rec->pwd=$newPwd;

		if($rec->save())
		{
			$this->addUserLog($phoneNum, "actionChangePwd", "密码修改", "");
			
			echo CJSON::encode(new Response(true,'密码修改成功！'));
		} else {
			echo CJSON::encode(new Response(false,'密码修改失败！'));
		}
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
			
			if(Drivercollect::model()->count(" driverId=:driverId and phoneNum=:phoneNum ",array("driverId"=>$Drivercollect->driverId,"phoneNum"=>$Drivercollect->phoneNum))>0){
			
				echo CJSON::encode(new Response(false,'司机已经收藏！'));
				return;
			}
			
            if($Drivercollect->save())
            {
                echo CJSON::encode(new Response(true,'收藏司机成功！'));	
            } else {
                echo CJSON::encode(new Response(false,'收藏司机失败！'));	
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
			
			$criteria->addCondition(" phoneNum  ='".$phoneNum."' ");
						
			$criteria->order=" id desc ";
			
			$collections=Drivercollect::model()->findAll($criteria);

			echo CJSON::encode(new OutJson(true, "执行成功", new Records(sizeof($collections),$collections)) );
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
						
			$criteria->addCondition(" phoneNum  ='".$phoneNum."' ");
						
			$criteria->order=" id desc ";
			
			$orders=SubmitOrder::model()->findAll($criteria);

			echo CJSON::encode(new OutJson(true, "执行成功", new Records(sizeof($orders),$orders))  );
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
	 		
	 		$comment->who=$this->getNoEmpty('who');//谁评价
	 		
	 		//
	 		if(Comment::model()->count(" who=:who and refId=:refId ",array(":who"=>$comment->who,":refId"=>$comment->refId))>0){
	 			
	 		 	echo CJSON::encode(new Response(false,'评价已经添加！ '));	
	 		 	return;
	 		}	 		
	 		
            if($comment->save())
            {
                echo CJSON::encode(new Response(true,'添加评价成功！'));	
            } else {
                echo CJSON::encode(new Response(false,'添加评价失败！ '));	
            }
	}
	
	/*
	 * 获取评价
	 * */
	public function actionComments(){
	
			$criteria =new CDbCriteria(); 
			$refId=$this->getNoEmpty('refId');
			$mtype=$this->getNoEmpty('mtype');
			
			$criteria->addCondition(" refId  ='".$refId."' ");
			$criteria->addCondition(" mtype =".$mtype);
			
			$criteria->order=" id asc ";
			
			$comments=Comment::model()->findAll($criteria);

			echo CJSON::encode(new OutJson(true, "操作成功", new Records(sizeof($comments),$comments))  );
	}	
	/**
	 13.获取所有路线和目的地
	 接口关键字：GetLine
	 输入参数：选择获取路线还是目的地（Int）
	 输出参数：JSON结果（路线或目的地名称）；多条记录
	 **/
	public function actionGetLine(){

		$lineArray=Line::model()->findAll();
		
		echo CJSON::encode(new OutJson(true, "操作成功", new Records(sizeof($lineArray),$lineArray))  );
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
			
			$criteria->addCondition(" sendto  ='".$phoneNum."' ");
			$criteria->addCondition(" status =0 ");
			
			$criteria->order=" level desc ,id asc ";
			
			$msgList=Message::model()->findAll($criteria);

			echo CJSON::encode(new OutJson(true, "操作成功", new Records(sizeof($msgList),$msgList)) );
	}
	
	public function actionUpdateNotification(){

		$criteria =new CDbCriteria();
		$phoneNum=$this->getNoEmpty('phoneNum');
			
		$id=$this->getNoEmpty('id');
			
		$rec=Message::model()->findByPk($id);

		if($rec!=null){
				
			$rec->status=1;
			if($rec->save())
			{
				$this->addUserLog($phoneNum, "actionUpdateProfile", "个人信息修改", "");
					
				echo CJSON::encode(new Response(true,'更新操作成功！'));
			} else {
				echo CJSON::encode(new Response(false,'更新操作失败！ '));
			}
		}
			
	}
	
	/*
	 * 15.添加用户反馈
	 * */
	public function actionFeedback(){
	
			$phoneNum=$this->getNoEmpty('phoneNum');
			$comment = new Comment();
            
	 		$comment->mtype=100;
	 		$comment->refId=0;
	 		$comment->star=0;
	 		$comment->remarks=$this->getNoEmpty('remarks');
	 		$comment->createDt=Date('Y-m-d H:i:s');
	 		
	 		$comment->who=$phoneNum;
	 		
            if($comment->save())
            {
                echo CJSON::encode(new Response(true,'用户反馈成功'));	
            } else {
                echo CJSON::encode(new Response(false,'用户反馈失败 '));	
            }
	}
}
 