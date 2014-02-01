<?php namespace App\Models;

class Message extends Elegant {

	protected $table = 'messages';

	protected $guarded = array();

 	protected $rules = array(
        'entity_type'  => 'required|in:offer, request, bid, transaction',
        'entity_id'    => 'required',
        'from_id'      => 'required',
        'to_id'        => 'required',
        'subject'      => 'required',
        'body'         => 'required|min:10',
    );

    public function entity()
    {
        return $this->morphTo();
    }

}