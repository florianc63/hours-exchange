<?php namespace App\Models;

class Offer extends Elegant {

	protected $table = 'offers';

	protected $guarded = array();

 	protected $rules = array(
        'title'        => 'required|min:3',
        'service_id'   => 'required',
        'body'         => 'required|min:10',
		'price'        => array('required', 'regex:/^[0-9]*(\.[0-9]+)?$/'),			
        'qty'          => 'required|numeric|between:1,50',
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
}
