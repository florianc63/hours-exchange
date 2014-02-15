<?php

class UserBidsController extends BaseController {

    public function index()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('created_at');
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$entries = Bid::where('buyer_id', '=', Sentry::getUser()->getId())->orderBy($sort, $order)->paginate(10);
		
		foreach($entries as $entry) {

			$entry->hx_request = HxRequest::where('id', '=', $entry->request_id)->first();
		}
		return \View::make('admin.bids.index')->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order));
    }

}