<?php

class SiteOffersController extends BaseController {

    public function getIndex()
    {
    	$offers = new Offer;
		$sort  = Input::get('sort');
		$order = Input::get('order');

		$entries = $offers->getOffers($sort, $order);

		return \View::make('offers')->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order));
    }
	
    public function getOffer($slug)
    {
		$offer = Offer::where('slug', $slug)->first();
		
		if( is_null($offer) )
			App::abort('404');
		else
			return View::make('offer')->with('entry', $offer);
    }


    public function postPayNow() {
		
		$offer 		 = Offer::find(Input::get('entry_id'));
		$demand 	 = Input::get('demand');
		$subject 	 = Input::get('subject');
		$body 		 = Input::get('body');
		$message_status = 'No message was sent.';

		if($offer->remaining - $demand < 0) {

			Session::flash('error', 'Not enough jobs left in this offer');

			return Redirect::route('user.profile', array('id' => $offer->author->id));
		}

		$transaction = new Transaction;
		$transaction->setTransaction('offer', $offer, $demand);

        $this->transactionable->remaining -= $value;
        $this->transactionable->save();
        
		if($subject != '') {

			$message = new Message;
			$message->sendMessage('transaction', $transaction->id, $offer->author->id, $subject, $body);

			$message_status = 'Message was sent.';
		}

		Session::flash('success', 'The hours were reserved. ' . $message_status);

		return Redirect::route('user.profile', array('id' => $offer->author->id));
	}

}