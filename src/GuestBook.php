<?php
namespace Tutorial;

class GuestBook
{
	private $messages = [];

	public function addMessage($message){
		$this->messages[] = $message;
	}

	public function getMessages(){
		return Database::get('*', 'guestbook');
	}
}