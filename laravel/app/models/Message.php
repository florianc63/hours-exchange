<?php namespace App\Models;

use Cartalyst\Sentry\Facades\Laravel\Sentry;

class Message extends Elegant {

	protected $table = 'messages';

	protected $guarded = array();

 	protected $rules = array(
        'entity_type'  => 'required|in:offer, request, bid, transaction',
        'entity_id'    => 'required',
        'from_id'      => 'required',
        'to_id'        => 'required',
        'subject'      => 'required',
        'body'         => '',
    );

    public function messageable()
    {
        return $this->morphTo();
    }

    public function sendMessage($entity_type, $entity_id, $to_id, $subject, $body) {

        $this->messageable_type  = $entity_type;
        $this->messageable_id    = $entity_id;
        $this->from_id           = Sentry::getUser()->getId();
        $this->to_id             = $to_id;
        $this->subject           = $subject;
        $this->body              = $body;
        $this->save();

        return $this;
    }
}