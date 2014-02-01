<?php

class SiteUserProfileController extends BaseController {

	public function getIndex($user_id) {

		$offers = new Offer;
		$user = User::find($user_id);
		$sort  = Input::get('sort');
		$order = Input::get('order');

		$entries = $offers->getOffers($sort, $order, $user_id);

		return View::make('users.profile')
				->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order, 'user' => $user));
	}

}