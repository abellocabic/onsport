<?php

namespace Controller;



use \W\Controller\Controller;
use \Manager\MessageManager;


class MessageController extends Controller
{	
	public function messages()
	{
		$id = $_POST['uid'];
		$pid = $_POST['pid'];
		$m = new MessageManager();
		$messages = $m->findAllById($id, $pid);
		//$this->showJson($messages);
		$this->show('default/messages', ['messages' => $messages]);
	}


}
