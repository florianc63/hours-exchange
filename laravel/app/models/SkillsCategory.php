<?php namespace App\Models;

class SkillsCategory extends Elegant {

	protected $table = 'skills_categories';

	protected $guarded = array();

 	protected $rules = array(
        'name' => 'required|unique:skills_categories|min:2',
        'place'  => '',
    );	

    public function skills()
    {
        return $this->hasMany('Skill');
    }
}
