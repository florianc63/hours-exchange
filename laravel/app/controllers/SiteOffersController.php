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
		
		$entry_id   = Input::get('entry_id');
		$qty 		= Input::get('qty');
		$seller_id  = Input::get('seller_id');
		
		$offer 		 = Offer::find($entry_id);		

		$transaction = new Transaction;

		$transaction->entity_type = 'offer';
		$transaction->entity_id	  = $offer->id;
		$transaction->buyer_id    = Sentry::getUser()->getId();
		$transaction->seller_id   = $offer->author->id;
		$transaction->value 	  = $qty * $offer->price;
		$transaction->save();

		$transaction->entity->qty -= $qty;
		$transaction->entity->save();

		Session::flash('success', 'The hours were reserved, you can send a personal message to discuss the details of this transaction.');

		return Redirect::route('user.profile', array('id' => $offer->author->id));
	}

}