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

    public function setTransaction($type, $entity, $value) {

        $this->transactionable_type  = $type;
        $this->transactionable_id    = $entity->id;
        $this->buyer_id              = Sentry::getUser()->getId();
        $this->seller_id             = $entity->author->id;
        $this->value                 = $value * $entity->price;
        $this->save();

        return $this;
    }

}