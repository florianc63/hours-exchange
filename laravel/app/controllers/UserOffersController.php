<?php

class UserOffersController extends BaseController {

    public function index()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('created_at'); 
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$entries = Offer::where('user_id', '=', Sentry::getUser()->getId())->orderBy($sort, $order)->paginate(10);
		
		foreach($entries as $entry) {

			$transactions = Transaction::where('transactionable_type', '=', 'offer')->where('transactionable_id', '=', $entry->id)->get();
			if(count($transactions) > 0) {
				$entry->payments = count($transactions);
			} else {
				$entry->payments = 'No payments yet';
			}
		}

		return \View::make('admin.offers.index')->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order));
    }
	
	public function show($id)
    {
    	$transactions = $transactions = Transaction::where('transactionable_type', '=', 'offer')->where('transactionable_id', '=', $id)->get();

    	foreach($transactions as $transaction) {

    		$transaction->user = Sentry::findUserById($transaction->buyer_id);
    		$messages = Message::where('messageable_type', '=', 'transaction')->where('messageable_id', '=', $transaction->id)->get();

			$transaction->message_collection = $messages;
    	}

        return \View::make('admin.offers.show')->with(array('offer' => Offer::find($id), 'transactions' => $transactions));
    }
 
    public function create()
    {
        return \View::make('admin.offers.create');
    }
 
    public function store()
	{		
		$offer = new Offer;

		if ($offer->validate())
		{			
			$image = '';

			if (Input::hasFile('image')) {
				$file            = Input::file('image');
				$destination_path = public_path() . '/uploads/';
				$filename        = str_random(6) . '_' . $file->getClientOriginalName();
				if( $upload_success = $file->move($destination_path, $filename) )
					$image = '/uploads/' . $filename;				
			}
		
			$offer->user_id               = Sentry::getUser()->id;
			$offer->service_id            = Input::get('service_id');
			$offer->title   	          = Input::get('title');
			$offer->slug                  = Str::slug(Input::get('title'));
			$offer->body   	              = Input::get('body');
			$offer->price   	          = Input::get('price');
			$offer->date_expire   	      = Input::get('date_expire');
			$offer->qty   	              = Input::get('qty');
			$offer->remaining   	      = Input::get('qty');
			$offer->location   	          = Input::get('location');
			$offer->image   	          = $image;
			$offer->visible   	          = 'yes';
			$offer->save();		
			 
			Session::flash('success', 'Entry saved successfully.');

			return Redirect::route('admin.offers.edit', $offer->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($offer->errors());
		}
	}
 
    public function edit($id)
    {
        return \View::make('admin.offers.edit')->with('offer', Offer::find($id));
    }
 
    public function update($id)
	{		
		$offer = Offer::find($id);

		if ($offer->validate($id))
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
					File::delete(public_path() . $offer->image);
				}
			}
						   
			$offer->service_id            = Input::get('service_id');
			$offer->title   	          = Input::get('title');
			$offer->slug                  = Str::slug(Input::get('title'));
			$offer->body   	              = Input::get('body');
			$offer->price   	          = Input::get('price');
			$offer->date_expire   	      = Input::get('date_expire');
			$offer->qty   	              = Input::get('qty');
			$offer->remaining   	      = Input::get('qty');
			$offer->location   	          = Input::get('location');
			$offer->image   	          = $image;
			//$offer->visible   	          = 'yes';
			$offer->save();		
		 
			Session::flash('success', 'Entry updated successfully.');

			return Redirect::route('admin.offers.edit', $offer->id);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($offer->errors());
		}
	}
 
    public function destroy($id)
	{
		$offer = Offer::find($id);	
		
		File::delete(public_path() . $offer->image);
		
		$offer->delete();
	 
		Session::flash('success', 'Entry deleted successfully.');

		return Redirect::route('admin.offers.index');
	}
     
}