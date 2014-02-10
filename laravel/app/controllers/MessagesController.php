<?php

class MessagesController extends BaseController {
	
    public function postMessage()
    {
    	$user_id 	 = Input::get('user_id');
		$subject 	 = Input::get('subject');
		$body 		 = Input::get('body');		

		$message = new Message;
		$message->sendMessage('message', '', $user_id, $subject, $body);

		Session::flash('success', 'Message was sent.');

		if( is_null($message) )
			App::abort('404');
		else
			return Redirect::route('user.profile', array('id' => $user_id));
    }

}