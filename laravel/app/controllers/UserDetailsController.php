<?php

class UserDetailsController extends BaseController {
	
    public function edit($id)
    {
		$user_details = UserDetail::find($id);
		$user = User::find($user_details->user_id);

		// check if user details belong to current logged in user
		// to do: do this in a cool way
		// and also on update
		if($user_details->member->id != Sentry::getUser()->id) 
			return Redirect::route('home');
		
		return \View::make('admin.userdetails.edit')->with(compact('user_details', 'user'));
    }
 
    public function update($id)
	{	
		// $user = User::find($id);
		// $user_details = $user->details();
	
		$user_details = UserDetail::find($id);

		if ($user_details->validate($id))
		{		
			$user_details->first_name		= Input::get('first_name');
			$user_details->last_name		= Input::get('last_name');
			$user_details->mobile		    = Input::get('mobile');
			$user_details->address		    = Input::get('address');
			$user_details->descr		    = Input::get('descr');
			$user_details->city		        = Input::get('city');
			$user_details->province		    = Input::get('province');
			$user_details->postal		    = Input::get('postal');
			$user_details->country		    = Input::get('country');
			$user_details->linkedin		    = Input::get('linkedin');
			$user_details->job_status		= Input::get('job_status');
			$user_details->save();
		 
			// Save user services
			$user = User::find($user_details->user_id);
			$user->services()->sync(Input::get('services'));		
			
			Session::flash('success', 'Entry updated successfully.');

			return Redirect::route('admin.userdetails.edit', $user_details->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($user_details->errors());
		}
	}	
 
}