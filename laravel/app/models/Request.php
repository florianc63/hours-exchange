<?php namespace App\Models;

use Cartalyst\Sentry\Facades\Laravel\Sentry;

class Request extends Elegant {

	protected $table = 'requests';

	protected $guarded = array();

 	protected $rules = array(
        'title'        => 'required|min:3',
        'service_id'   => 'required',
        'body'         => 'required|min:10',
		'price'        => array('required', 'regex:/^[0-9]*(\.[0-9]+)?$/'),
        'date_expire'  => 'required|date',
        'location'     => 'required|min:3',
        'image'        => 'image|max:3000'
    );	

    public function author()
    {
        return $this->belongsTo('User', 'user_id');
    }
    public function service()
    {
        return $this->belongsTo('Service', 'service_id');
    }
    public function transactions()
    {
        return $this->morphMany('Transaction', 'entity');
    }
    public function messages()
    {
        return $this->morphMany('Message', 'messageable');
    }

    public function getRequests($input_sort, $input_order, $user_id = null) {

        // add allowable columns to search/sort on
        $allowed_cols = array('created_at'); 
        
        // default column to sort 'created_at'
        $sort = in_array($input_sort, $allowed_cols) ? $input_sort : 'created_at'; 
        
        // default order 'desc'
        $order = $input_order === 'asc' ? 'asc' : 'desc';
/*
        if($user_id != null)
            return \HxRequest::where('user_id', $user_id)->orderBy($sort, $order)->paginate(5);
        else
            return \HxRequest::where('user_id', '!=', Sentry::getUser()->getId())->orderBy($sort, $order)->paginate(5);
*/
        if (Sentry::check())
            return \HxRequest::where('user_id', '!=', Sentry::getUser()->getId())->orderBy($sort, $order)->paginate(5);
        else
            return \HxRequest::orderBy($sort, $order)->paginate(5);
    }

}
