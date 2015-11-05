<?php
namespace Tutorial;

class GuestBookTest extends \PHPUnit_Framework_TestCase
{
	public function test_get_message_function(){
		$gb = new GuestBook();
		$gb->addMessage(new Message('Phil', 'Hello World from Phil'));

		$expected = 'Hello World from Phil';

		$messages = $gb->getMessages();
		$messagesArray = [];

		while($row = mysqli_fetch_array($messages)){
			$messagesArray[] = $row['message'];
		}
		
		$this->assertTrue(in_array($expected, $messagesArray));
	}
}