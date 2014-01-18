<?php namespace App\Models;

class Skill extends Elegant {

	protected $table = 'skills';

	protected $guarded = array();

 	protected $rules = array(
        'name' => 'required|unique:skills|min:3',
    );	
	
    public function author()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('SkillsCategory', 'category_id');
    }

}