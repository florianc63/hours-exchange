<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// make id's numeric
Route::pattern('id', '\d+');

// Home
Route::get('/', array('as' => 'home', function() 
{
	$homepage_id = Settings::where('key', 'homepage')->first()->value;
    
	return View::make('page')
				->with('entry', Page::where('id', $homepage_id)->first());
				//->with('entry', Page::orderBy('created_at', 'desc')->first());
}));

// Member profiles
Route::get('users',				  			array('as' => 'user.list', 		 'uses' => 'UserController@getUsers'));
Route::get('users/{id}',   		  			array('as' => 'user.profile',    'uses' => 'SiteUserProfileController@getIndex'));
Route::get('users/{id}/offers',   			array('as' => 'user.offers',     'uses' => 'SiteUserProfileController@getOffers'));
Route::get('users/{id}/requests',   		array('as' => 'user.requests',   'uses' => 'SiteUserProfileController@getRequests'));

// Offers
Route::post('offers/pay_now', 	  array('as' => 'pay.now', 			 'uses' => 'SiteOffersController@postPayNow'));
Route::get('offers',   			  array('as' => 'offer.list',      	 'uses' => 'SiteOffersController@getIndex'));
Route::get('offers/{slug}',   	  array('as' => 'offer',      		 'uses' => 'SiteOffersController@getOffer'));

// Requests
Route::get('requests/accept/bid/{id}',	array('as' => 'accept.bid',		'uses' => 'SiteRequestsController@acceptBid'));
Route::post('requests/bid',		  		array('as' => 'bid',			'uses' => 'SiteRequestsController@postBidNow'));
Route::get('requests',   		  		array('as' => 'request.list',   'uses' => 'SiteRequestsController@getIndex'));
Route::get('requests/{slug}',     		array('as' => 'request',      	'uses' => 'SiteRequestsController@getRequest'));

// Messages
Route::post('message',	  	  	  array('as' => 'message',			 'uses' => 'MessagesController@postMessage'));

// Single page
Route::get('{slug}', array('as' => 'page', function($slug) 
{
	$page = Page::where('slug', $slug)->first();
	
	if( is_null($page) )
		App::abort('404');
	else
		return View::make('page')->with('entry', $page);
		
}))->where('slug', '^((?!admin).)*$');


// Member register/activate/login/logout/resetpass
Route::group(array('prefix' => 'admin'), function()
{
	Route::get('users/register',   			  array('as' => 'admin.user.register',      	 'uses' => 'UserController@getRegister'));
	Route::post('users/register',  			  array('as' => 'admin.user.register.post',      'uses' => 'UserController@postRegister'));
	Route::get('users/activate/{id}/{code}',  array('as' => 'admin.user.activate',      	 'uses' => 'UserController@getActivate'))->where('id', '\d+');

	Route::get('users/login',   			  array('as' => 'admin.user.login',       		 'uses' => 'UserController@getLogin'));
	Route::post('users/login',  			  array('as' => 'admin.user.login.post',  		 'uses' => 'UserController@postLogin'));
	Route::get('users/logout',  			  array('as' => 'admin.user.logout',      		 'uses' => 'UserController@getLogout'));

	Route::get('users/resetpassword',   	  array('as' => 'admin.user.resetpassword',      'uses' => 'UserController@getResetpassword'));
	Route::post('users/resetpassword',  	  array('as' => 'admin.user.resetpassword.post', 'uses' => 'UserController@postResetpassword'));
	Route::get('users/resend',   			  array('as' => 'admin.user.resend',      		 'uses' => 'UserController@getResend'));
	Route::post('users/resend',  			  array('as' => 'admin.user.resend.post',        'uses' => 'UserController@postResend'));	
	Route::get('users/reset/{id}/{code}',  	  array('as' => 'admin.user.reset',      		 'uses' => 'UserController@getReset'))->where('id', '\d+');
});


// Here goes Member Admin

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	Route::resource('offers', 'UserOffersController');
	Route::resource('requests', 'UserRequestsController');	
	Route::resource('userdetails', 'UserDetailsController', array('only' => array('edit', 'update')));

	Route::get('messages', 					array('as' => 'admin.messages.index', 		'uses' => 'UserMessagesController@index'));
	Route::get('messages/{id}', 			array('as' => 'admin.messages.show', 		'uses' => 'UserMessagesController@show'));
	Route::get('messages/reply/{id}', 		array('as' => 'admin.messages.reply', 		'uses' => 'UserMessagesController@getReply'));
	Route::post('messages/reply/send', 		array('as' => 'admin.messages.reply.send', 	'uses' => 'UserMessagesController@postReply'));
	Route::delete('messages/destroy/{id}', 	array('as' => 'admin.messages.destroy', 	'uses' => 'UserMessagesController@destroy'));
});



// Site Admin
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::any('/', 'UserController@getIndex');	
	Route::controller('users', 'UserController');
	
	// make id's for resources numeric
	Route::pattern('groups', '\d+');
	Route::pattern('pages', '\d+');
	Route::pattern('services', '\d+');
	Route::pattern('skillscategories', '\d+');
	Route::pattern('skills', '\d+');
//	Route::pattern('offers', '\d+'); 
//	Route::pattern('requests', '\d+');

	// RESTful controllers
	Route::resource('groups', 'GroupController');
	Route::resource('pages', 'PagesController');
	Route::resource('services', 'ServicesController');
	Route::resource('skillscategories', 'SkillsCategoriesController');
	Route::resource('skills', 'SkillsController');
//	Route::resource('offers', 'OffersController', array('except' => array('show')));
//	Route::resource('requests', 'RequestsController', array('except' => array('show')));

});

// 404 Page
App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});


