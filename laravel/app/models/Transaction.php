<?php namespace App\Models;

use Cartalyst\Sentry\Facades\Laravel\Sentry;

class Transaction extends Elegant {

	protected $table = 'transactions';

	protected $guarded = array();

 	protected $rules = array(
        'entity_type' => 'required|in:offer, request',
        'entity_id'   => 'required',
        'buyer_id'    => 'required',
        'seller_id'   => 'required',
        'value'       => 'required|numeric',
    );

    public function transactionable()
    {
        return $this->morphTo();
    }
    public function messages()
    {
        return $this->morphMany('Message', 'messageable');
    }

    public function setTransaction($offer, $qty) {

        $this->transactionable_type  = 'offer';
        $this->transactionable_id    = $offer->id;
        $this->buyer_id              = Sentry::getUser()->getId();
        $this->seller_id             = $offer->author->id;
        $this->value                 = $qty * $offer->price;
        $this->save();

        return $this;
    }

}