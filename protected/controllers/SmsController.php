<?php
class SmsController extends Controller
{

	public function actionIndex()
	{
		//echo " exe begin  :\r\n";	
		
		$result=$this->checkSms();
		
		echo " msg num:".sizeof($result)."\\n";
		
		for($index=0;$index<sizeof($result);$index++){
			
			echo $mobile;
			
			$mobile=$result[$index]["mobile"];
			$destmobile=$result[$index]["destmobile"];
			$content=$result[$index]["content"];
			$time=$result[$index]["time"];
			
			$entity=Sms::model()->findByPk("refId", $content);
			
			if($entity!=null){
			
				$entity->replyMsg=$content;
				$entity->replyDate=$time;
				
				$entity->save();
			}
			
			$order=SubmitOrder::model()->findByPk("id", $content);
			
			if($order!=null){
			
				$order->status=1;
				$order->save();
				
				$this->sendSms(	$order->phoneNum, "您好，你提交的订单号$content,司机【$mobile】已经确定，订单正式生效！", $content, 4);
			}
			
		}
		
		//echo " exe end .\r\n";
	}
}