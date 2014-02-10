<?php

class SiteUserProfileController extends BaseController {

	public function getIndex($user_id) {

		$user = User::find($user_id);

		return View::make('users.profile')
				->with(array('user' => $user));
	}

	public function getOffers($user_id) {

		$offers = new Offer;
		$user = User::find($user_id);
		$sort  = Input::get('sort');
		$order = Input::get('order');

		$entries = $offers->getOffers($sort, $order, $user_id);

		return View::make('users.offers')
				->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order, 'user' => $user));
	}

	public function getRequests($user_id) {

		$requests = new HxRequest;
		$user = User::find($user_id);
		$sort  = Input::get('sort');
		$order = Input::get('order');

		$entries = $requests->getRequests($sort, $order, $user_id);

		return View::make('users.requests')
				->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order, 'user' => $user));
	}

}