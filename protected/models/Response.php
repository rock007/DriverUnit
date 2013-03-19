<?php
class Response 
{	
	public $result;// true ,false	
	
	public $msg;   //消息提示 
	
	public $body;  //内容,数据，单条，多条
	
	function Response($key1,$key2){
		$this->result=$key1;
		$this->msg=$key2;
		
	}
	
}