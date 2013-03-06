<?php
class Response 
{
	public $result;	
	public $body;
	public $extra;
	
	function Response($key1,$key2,$key3){
		$this->result=$key1;
		$this->body=$key2;
		$this->extra=$key3;		
	}
	
}