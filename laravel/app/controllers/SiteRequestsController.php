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
		$bids 	 = Bid::where('request_id', '=', $request->id)->get();

		foreach($bids as $bid) {

    		$bid->user = Sentry::findUserById($bid->seller_id);
    	}

		if( is_null($request) )
			App::abort('404');
		else
			return View::make('request')->with(array('entry' => $request, 'bids' => $bids));
    }

    public function postBidNow() {
		
		$request 	 = HxRequest::find(Input::get('entry_id'));
		$price 	 	 = Input::get('price');
		$subject 	 = Input::get('subject');
		$body 		 = Input::get('body');
		$message_status = 'No message was sent.';

		$bid = new Bid;
		$bid->setBid($request, $price);

		if($subject != '') {

			$message = new Message;
			$message->sendMessage('bid', $bid->id, $request->author->id, $subject, $body);

			$message_status = 'Message was attached to bid.';
		}

		Session::flash('success', 'Bid was sent. ' . $message_status);

		return Redirect::route('user.profile', array('id' => $request->author->id));
	}

	public function acceptBid($bid_id) {
	
		$bid = Bid::find($bid_id);

		$transaction = new Transaction;
		$transaction->setTransaction('request', $bid->request_id, $bid->buyer_id, $bid->seller_id, $bid->value);

		// to do: close request after bid is accepted
		Session::flash('success', 'Bid accepted.');

		return Redirect::back();
	}

}