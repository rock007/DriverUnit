<?php
require_once 'BayouSmsSender.php';

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	

	
	function getNoEmpty($key){
		
		if(isset($_GET[$key]) && ($$key=trim($_GET[$key]))!=='')
		{
			return $$key;
		}else{
			echo CJSON::encode(new Response(false,'参数不能为空',$key));
			die();
		}
	}
	
	function getKey($key){
		
		if(isset($_GET[$key]) && ($$key=trim($_GET[$key]))!=='')
		{
			return $$key;
		}else{
			return "";
		}
	}
	
	function setCurPg($pg){
		global $pgname;
		$pgname=$pg;
	}
	
	function mkRandCode(){
		//生成4位数字
		$vcodes="";
		for($i=0;$i<4;$i++){			
			$authnum=rand(1,9);
			
			$vcodes=((string)$vcodes).((string)$authnum);	
		}
		return $vcodes;
	}

	function sendSms($mobile,$msg){
		$sms_user="603308";
		$sms_pwd="13818474956" ;//65460433
	
		$sender=new BayouSmsSender();
		//"13162550089,13162550089"
		//$msg="这是个测试短信，短信内容要从非GB2312Z转化到GB2312,我们假设在UTF8环境下运行";

		//$change=iconv("UTF-8","GB2312",$msg);
		
		$result=$sender->sendsms($sms_user,md5($sms_pwd),$mobile,$msg);
 		//echo $result['status'];
  		//echo $result['msg'];
  
  		return $result;
	}
}