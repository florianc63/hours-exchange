<?php

class UserRequestsController extends BaseController {

    public function index()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('created_at'); 
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$entries = HxRequest::where('user_id', '=', Sentry::getUser()->getId())->orderBy($sort, $order)->paginate(10);
		
		foreach($entries as $entry) {

			$bids = Bid::where('request_id', '=', $entry->id)->get();
			$entry->bids = count($bids);
		}

		return \View::make('admin.requests.index')->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order));
    }
	
	public function show($id)
    {
    	$bids = Bid::where('request_id', '=', $id)->get();

    	foreach($bids as $bid) {

    		$bid->user = Sentry::findUserById($bid->seller_id);
    		$messages = Message::where('messageable_type', '=', 'bid')->where('messageable_id', '=', $bid->id)->get();

			$bid->message_collection = $messages;
    	}

        return \View::make('admin.requests.show')->with(array('request' => HxRequest::find($id), 'bids' => $bids));
    }
 
    public function create()
    {
        return \View::make('admin.requests.create');
    }
 
    public function store()
	{		
		$request = new HxRequest;

		if ($request->validate())
		{			
			$image = '';

			if (Input::hasFile('image')) {
				$file            = Input::file('image');
				$destination_path = public_path() . '/uploads/';
				$filename        = str_random(6) . '_' . $file->getClientOriginalName();
				if( $upload_success = $file->move($destination_path, $filename) )
					$image = '/uploads/' . $filename;				
			}
		
			$request->user_id               = Sentry::getUser()->id;
			$request->service_id            = Input::get('service_id');
			$request->title   	          	= Input::get('title');
			$request->slug                  = Str::slug(Input::get('title'));
			$request->body   	            = Input::get('body');
			$request->price   	          	= Input::get('price');
			$request->date_expire   	    = Input::get('date_expire');
			// $request->qty   	            = Input::get('qty');
			$request->location   	        = Input::get('location');
			$request->image   	          	= $image;
			$request->visible   	        = 'yes';
			$request->status 				= 'active';
			$request->save();		
			 
			Session::flash('success', 'Entry saved successfully.');

			return Redirect::route('admin.requests.edit', $request->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($request->errors());
		}
	}
 
    public function edit($id)
    {
        return \View::make('admin.requests.edit')->with('request', HxRequest::find($id));
    }
 
    public function update($id)
	{		
		$request = HxRequest::find($id);

		if ($request->validate($id))
		{				
			$image = '';

			if (Input::hasFile('image')) {			
				$file            = Input::file('image');
				$destination_path = public_path() . '/uploads/';
				$filename        = str_random(6) . '_' . $file->getClientOriginalName();
				if( $upload_success = $file->move($destination_path, $filename) )
				{
					$image = '/uploads/' . $filename;
					
					// delete old image
					File::delete(public_path() . $request->image);
				}
			}
						   
			$request->service_id            = Input::get('service_id');
			$request->title   	          	= Input::get('title');
			$request->slug                  = Str::slug(Input::get('title'));
			$request->body   	            = Input::get('body');
			$request->price   	          	= Input::get('price');
			$request->date_expire   	    = Input::get('date_expire');
			// $request->qty   	            = Input::get('qty');
			$request->location   	        = Input::get('location');
			$request->image   	          	= $image;
			//$request->visible   	        = 'yes';
			$request->save();		
		 
			Session::flash('success', 'Entry updated successfully.');

			return Redirect::route('admin.requests.edit', $request->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($request->errors());
		}
	}
 
    public function destroy($id)
	{
		$request = HxRequest::find($id);	
		
		File::delete(public_path() . $request->image);
		
		$request->delete();
	 
		Session::flash('success', 'Entry deleted successfully.');

		return Redirect::route('admin.requests.index');
	}
     
}