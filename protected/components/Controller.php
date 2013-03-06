<?php
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
}