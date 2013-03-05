<?php
class JsonController extends Controller
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
		
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];		
			else
				echo "is error ";
	    }else{
	    	echo  " no  ajax  is error ";
	    }
	}
	
	public function actionLogin(){
	
		echo "dd";
	}
}
	    