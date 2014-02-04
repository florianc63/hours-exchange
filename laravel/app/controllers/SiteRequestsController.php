<?php

class SiteRequestsController extends BaseController {

    public function getIndex()
    {
    	$requests = new HxRequest;
		$sort  = Input::get('sort');
		$order = Input::get('order');

		$entries = $requests->getRequests($sort, $order);

		return \View::make('requests')->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order));
    }
	
    public function getRequest($slug)
    {
		$request = HxRequest::where('slug', $slug)->first();
		
		if( is_null($request) )
			App::abort('404');
		else
			return View::make('request')->with('entry', $request);
    }

/*
    public function postPayNow() {
		
		$request 		 = HxRequest::find(Input::get('entry_id'));
		$demand 	 = Input::get('demand');
		$subject 	 = Input::get('subject');
		$body 		 = Input::get('body');
		$message_status = 'No message was sent.';

		if($request->remaining - $demand < 0) {

			Session::flash('error', 'Not enough jobs left in this request');

			return Redirect::route('user.profile', array('id' => $request->author->id));
		}

		$transaction = new Transaction;
		$transaction->setTransaction($request, $demand);

		if($subject == '') {
			$message = new Message;
			$message->sendMessage('transaction', $transaction->id, $request->author->id, $subject, $body);

			$message_status = 'Message was sent.';
		}

		Session::flash('success', 'The hours were reserved. ' . $message_status);

		return Redirect::route('user.profile', array('id' => $request->author->id));
	}
*/
}