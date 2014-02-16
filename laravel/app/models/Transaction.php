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

    public function setTransaction($entity_type, $entity_id, $buyer_id, $seller_id, $value) {

        $this->transactionable_type  = $entity_type;
        $this->transactionable_id    = $entity_id;
        $this->buyer_id              = $buyer_id;
        $this->seller_id             = $seller_id;
        $this->value                 = $value;
        $this->save();
/*
        if($entity_type == 'offer') {
            $transaction = Transaction::find($this->id);

            
        }*/
        return $this;
    }

}