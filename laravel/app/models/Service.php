<?php namespace App\Models;

class Service extends Elegant {

	protected $table = 'services';

	protected $guarded = array();

 	protected $rules = array(
        'name' => 'required|unique:services|min:2',
        'place'  => '',
    );	
	
	public function users()
    {
       // return $this->belongsToMany('User');
		return $this->belongsToMany('User', 'service_user', 'service_id', 'user_id');
    }
	public function offers()
    {
        return $this->hasMany('Offer');
    }
}
