<?php
class OutJson 
{
	public $result;// true ,false	
	
	public $msg;   //消息提示 
	
	public $body;  //内容,数据，单条，多条
	
	function OutJson($key1,$key2,$key3){
		
		$this->result=$key1;
		
		$this->msg=$key2;		
		
		$this->body=$key3;
	}
	
}