<?php
class SmsController extends Controller
{

	public function actionIndex()
	{
		//echo " exe begin  :\r\n";	
		
		$result=$this->checkSms();
		
		echo " msg num:".sizeof($result);
		
		for($index=0;$index<sizeof($result);$index++){
			
			$mobile=$result[$index]["mobile"];
			
			echo $mobile;
			
			$destmobile=$result[$index]["destmobile"];
			$content=$result[$index]["content"];
			$time=$result[$index]["time"];

			$entity=Sms::model()->find(" refId=:refId and sendTo=:sendTo", array(":refId"=>$content,":sendTo"=>$mobile));
			
			if($entity!=null){
			
				$entity->replyMsg=$content;
				$entity->replyDate=$time;
				
				$entity->save();
			}
			
			$order=SubmitOrder::model()->findByPk($content);
			
			if($order!=null){
				
				$msg=new Message();
            	$msg->title="订单生效通知";
            	$msg->content="尊敬的用户".$order->phoneNum."，你的订单已经确认，已经生效.";
            	$msg->sendto=$order->phoneNum;
            	$msg->level=2;
            	$msg->status=0;
            	$msg->createDt=Date('Y-m-d H:i:s');
            	
            	$msg->save();  

            	$order->status=1;
				$order->save();
								
				//$this->sendSms(	$order->phoneNum, "您好，你提交的订单号$content,司机$mobile已经确定，订单正式生效！", $content, 4);
				
			}	
			
		}
		
		//echo " exe end .\r\n";
	}
}