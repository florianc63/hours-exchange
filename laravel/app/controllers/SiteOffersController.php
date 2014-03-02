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
		$offer 	 	  = Offer::where('slug', $slug)->first();
		$transactions = Transaction::where('transactionable_type', 'offer')->where('transactionable_id', $offer->id)->get();

		if( is_null($offer) )
			App::abort('404');
		else
			return View::make('offer')->with(array('entry' => $offer, 'transactions' => $transactions));
    }


    public function postPayNow() {
		
		$offer 		 	= Offer::find(Input::get('entry_id'));
		$demand 	 	= Input::get('demand') * $offer->price;
		$subject 	 	= Input::get('subject');
		$body 		 	= Input::get('body');
		$message_status = 'No message was sent.';

		$user_balance 	= User::find(Sentry::getUser()->id)->details->balance;
		$balance_after_transaction = $user_balance - Input::get('demand') * $offer->price;

		if ($user_balance < 0) {

			Session::flash('error', 'You cannot pay because your balance is negative. Do some work first.');
			return Redirect::back()->withInput();

		} elseif ($balance_after_transaction < 0) {

			Session::flash('error', "You cannot pay because this transaction will result in a negative balance for you.<br /> You wanted to pay: " . Input::get('demand') * $offer->price . ', resulting balance would be: ' . $balance_after_transaction);
			return Redirect::back()->withInput();
		}

		if($offer->remaining - $demand < 0) {

			Session::flash('error', 'Not enough jobs left in this offer');

			return Redirect::route('user.profile', array('id' => $offer->author->id));
		}

		$transaction = new Transaction;
		$transaction->setTransaction('offer', $offer->id, Sentry::getUser()->getId(), $offer->author->id, $demand);
        
        $transaction->transactionable->remaining -= $demand;
        $transaction->transactionable->save();

		if($subject != '') {

			$message = new Message;
			$message->sendMessage('transaction', $transaction->id, $offer->author->id, $subject, $body);

			$message_status = 'Message was sent.';
		}

		Session::flash('success', 'The hours were reserved. ' . $message_status);

		return Redirect::back()->withInput();
		// return Redirect::route('user.profile', array('id' => $offer->author->id));
	}

}