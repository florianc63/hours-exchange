<?php namespace App\Models;

class Page extends Elegant {

	protected $table = 'pages';

	protected $guarded = array();

 	protected $rules = array(
        'title' => 'required|unique:pages|min:5',
        'body'  => 'required|min:5',
    );	

    public function author()
    {
        return $this->belongsTo('User', 'user_id');
    }
}