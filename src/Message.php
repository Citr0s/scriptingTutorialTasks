<?php
namespace Tutorial;

use Exception;

class Message
{
	public $id;
	public $name;
	public $message;
	public $timestamp;

	function __construct($name, $message){

		self::validateFileds($name, $message);

		$this->id = uniqid();
		$this->name = $name;
		$this->message = $message;
		$this->timestamp = date('Y-m-d H:i:s');

		Database::add($this->id, $this->name, $this->message, $this->timestamp);
	}

	private function validateFileds($name, $message){
		try{
			if($name !== strip_tags($name) || $message !== strip_tags($message)){
				throw new Exception('Input cannot contain HTML type tags');
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
}