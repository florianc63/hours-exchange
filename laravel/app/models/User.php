<?php namespace App\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Cartalyst\Sentry\Users\Eloquent\User implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function details()
    {
        return $this->hasOne('UserDetail');
    }
	public function pages()
    {
        return $this->hasMany('Page');
    }
	public function offers()
    {
        return $this->hasMany('Offer');
    }
	public function skills()
    {
        return $this->hasMany('Skill');
    }
    public function messages()
    {
        return $this->morphMany('Message', 'messageable');
    }
	public function services()
    {
//        return $this->belongsToMany('Service', 'service_id');
		return $this->belongsToMany('Service', 'service_user', 'user_id', 'service_id');
    }
	
}