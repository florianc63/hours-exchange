<?php namespace App\Models;

use Cartalyst\Sentry\Facades\Laravel\Sentry;

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
        return $this->morphMany('Message', 'messageable');
    }

    public function request()
    {
        return $this->belongsTo('Request');
    }

    public function setBid($request, $price) {

        $this->request_id = $request->id;
        $this->buyer_id   = $request->author->id;
        $this->seller_id  = Sentry::getUser()->getId();
        $this->value      = $price;
        $this->save();

        return $this;
    }
}