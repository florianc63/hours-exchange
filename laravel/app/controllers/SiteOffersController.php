<?php

class SiteOffersController extends BaseController {

    public function getIndex()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('created_at'); 
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$entries = Offer::orderBy($sort, $order)->paginate(5);

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