<?php namespace App\Models;

class UserDetail extends Elegant {

	protected $table = 'user_details';

	protected $guarded = array();

 	protected $rules = array(
        'first_name' => 'required|min:2',
        'last_name'  => 'required|min:2',
        'balance'    => 'numeric',
    );

    public function member()
    {
        return $this->belongsTo('User', 'user_id');
    }
}