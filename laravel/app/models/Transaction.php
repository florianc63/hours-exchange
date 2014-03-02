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

    public function buyer()
    {
        return $this->belongsTo('User', 'buyer_id');
    }

    public function setTransaction($entity_type, $entity_id, $buyer_id, $seller_id, $value) {

        $user = User::find(Sentry::getUser()->id);

        $this->transactionable_type  = $entity_type;
        $this->transactionable_id    = $entity_id;
        $this->buyer_id              = $buyer_id;
        $this->seller_id             = $seller_id;
        $this->value                 = $value;
        $this->save();
        
        $user->details->balance -= $value;
        $user->details->save();

        return $this;
    }

    public function resolveRequest($accepted_bid) {

        $request = \HxRequest::find($accepted_bid->request_id);
        $bids_to_decline = \Bid::where('request_id', $accepted_bid->request_id)->where('id', '!=', $accepted_bid->id)->get();

        $request->status = 'resolved';
        $request->save();

        $accepted_bid->status = 'accepted';
        $accepted_bid->save();

        foreach($bids_to_decline as $bid) {
            
            $bid->status = 'declined';
            $bid->save();
        }
    }

}