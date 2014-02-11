<?php

class UserMessagesController extends BaseController {

    public function index()
    {
		// add allowable columns to search/sort on
		$allowed_cols = array('created_at');
		
		// default column to sort 'created_at'
		$sort = in_array(Input::get('sort'), $allowed_cols) ? Input::get('sort') : 'created_at'; 
		
		// default order 'desc'
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		// sort & paginate
		$entries = Message::orderBy($sort, $order)->paginate(10);

		foreach($entries as $entry) {

			$entry->user = Sentry::findUserById($entry->from_id);
		}

		return \View::make('admin.messages.index')->with(array('entries' => $entries, 'sort' => $sort, 'order' => $order));
    }

    public function show($id)
    {
    	$message = Message::find($id);
    	$message->user = Sentry::findUserById($message->from_id);

        return \View::make('admin.messages.show')->with('entry', $message);
    }

    public function getReply($id) {

    	return \View::make('admin.messages.reply')->with('id', $id);
    }

    public function postReply() {

    	$reply_to 	 = Message::find(Input::get('id'));
    	
    	if ($reply_to->messageable_type == 'message') {
    		$reply_id = $reply_to->id;
    	} else {
    		$reply_id = $reply_to->messageable_id;
    	}

		$subject 	 = Input::get('subject');
		$body 		 = Input::get('body');

		$message = new Message;
		$message->sendMessage($reply_to->messageable_type, $reply_id, $reply_to->from_id, $subject, $body);

		Session::flash('success', 'Message was sent.');

		if( is_null($message) )
			App::abort('404');
		else
			return Redirect::back()->withInput()->withErrors($message->errors());
    }

	public function destroy($id)
	{
		$message = Message::find($id);	
		$message->delete();
	 
		Session::flash('success', 'Entry deleted successfully.');

		return Redirect::route('admin.messages.index');
	}

}