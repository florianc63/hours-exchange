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
 
}