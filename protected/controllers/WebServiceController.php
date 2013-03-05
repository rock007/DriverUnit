<?php
class WebServiceController extends Controller
{

	function getPost($key){
	
		if(!isset($_POST[$key])){
			
		}
		$keyValue=$_POST[$key];
		if(empty($keyValue)){
		
		}
		
	}
	
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
		
		if(!isset($_POST['curVer'])){
		
			echo CJSON::encode(array('curVer'=>'1.2 ','isNewVer'=>false,'msg'=>' curVer不能为空！  '));
			return ;
		}
		
		$curVer=$_POST['curVer'];
		
		if($curVer==null||empty($curVer)){
			//如果为空
			echo CJSON::encode(array('curVer'=>'1.2 ','isNewVer'=>false,'msg'=>' curVer不能为空！  '));
		}
		echo CJSON::encode(array('curVer'=>'1.2 ','isNewVer'=>false,'msg'=>'  '));
		
	}

	/**
	 2.注册
	 接口关键字：RegisterUser
	 输入参数：手机号码MobileNumber（String）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionRegisterUser(){


	}

	/**
	 3.登录
	 接口关键字：Login
	 输入参数：手机号码MobileNumber（String），密码Password(String)
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionLogin(){


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


	}

	/**
	 6.确认行程
	 接口关键字：SubmitOrder
	 输入参数：起始时间StartTime（Date），结束时间EndTime（Date），司机ID（Int）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionSubmitOrder(){


	}

	/**
	 7.个人信息修改
	 接口关键字：UpdateProfile
	 输入参数：姓名Name（String），昵称（String），性别Gender（Boolean），所在城市City（String）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionUpdateProfile(){

		echo "this is test ";
	}

	/**
	 8.密码修改
	 接口关键字：ChangePwd
	 输入参数：手机号码MobileNumber（String），原密码OldPassword(String)，新密码NewPassword(String)，
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionChangePwd(){


	}

	/**
	 9.收藏
	 接口关键字：Collection
	 输入参数：司机ID（Int）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionCollection(){


	}

	/**
	 10.收藏记录
	 接口关键字：CollectionHistory
	 输入参数：无
	 输出参数：JSON结果（司机ID，司机称呼，车型，星级评价，路线，驾龄，所在地）；多条记录或无记录
	 **/
	public function actionCollectionHistory(){


	}

	/**
	 11.行程记录
	 接口关键字：OrderHistory
	 输入参数：无
	 输出参数：JSON结果（OrderID，订单状态，开始时间，结束时间，路线，司机ID，司机称呼）；多条记录或无记录；司机详情使用DriverDetail获取
	 **/
	public function actionOrderHistory(){


	}

	/**
	 12.点评投诉
	 接口关键字：Comments
	 输入参数：OrderID（Int），点评星级（Int），点评内容（String）
	 输出参数：成功/失败(Boolean)；失败原因Reason（String）
	 **/
	public function actionComments(){


	}
	/**
	 13.获取所有路线和目的地
	 接口关键字：GetLine
	 输入参数：选择获取路线还是目的地（Int）
	 输出参数：JSON结果（路线或目的地名称）；多条记录
	 **/
	public function actionGetLine(){


	}

	/**
	 14.查询服务器向用户通知信息，需程序定时查询
	 接口关键字：Notification
	 输入参数：查询起始ID(Int)，使用上次获取通知ID + 1值
	 输出参数：JSON结果（通知ID，通知内容String）；多条记录或无记录
	 **/
	public function actionNotification(){


	}
}
 