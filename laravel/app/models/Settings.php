<?php namespace App\Models;

class Settings extends Elegant {

	protected $table = 'settings';

	protected $guarded = array();

 	protected $rules = array(
        'key' => 'required|unique:settings',
        'value'  => 'required',
    );	

}