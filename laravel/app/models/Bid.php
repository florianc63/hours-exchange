<?php namespace App\Models;

class Bid extends Elegant {

	protected $table = 'bids';

	protected $guarded = array();

 	protected $rules = array(
        'request_id'  => 'required',
        'buyer_id'    => 'required',
        'seller_id'   => 'required',
        'value'       => 'required|numeric',
    );

    public function messages()
    {
        return $this->morphMany('Message', 'entity')
    }
/*
    public function request()
    {
        return $this->belongsTo('Request');
    }
*/
}