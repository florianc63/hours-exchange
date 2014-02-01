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


    public function postPayNow($id) {

		$offer = new Offer::find($id);

		if($offer->validate($id))
		{
			$offer->qty = Input::get('qty');
		
			// Save user services
			$user = User::find($user_details->user_id);
			$user->services()->sync(Input::get('services'));		
			
			Session::flash('success', 'The hours were reserved, you can send a personal message to discuss the details of this transaction.');

			return Redirect::route('');
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($user_details->errors());
		}
	}

}