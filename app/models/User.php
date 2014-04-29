<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

	protected $table = 'users';
	protected $hidden = array('password');
	public $timestamps = false;

	public static function boot()
	{
		parent::boot();
		static::creating(function($user)
		{
			$user->joined = date('Y-m-d H:i:s', time());
		});
	}

	public function students()
	{
		$this->hasOne('Student', 'user_id');
	}

	public function advers()
	{
	    if($this->user_type != 1)
	        return $this->hasMany('Adver', 'user_id');
	    App::abort(404);
	}

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	public function isCompanyGuy()
	{
		return $this->user_type !== 1;
	}

	public function isStudent()
	{
		return $this->user_type === 1;
	}

	public function getDomain()
	{
		$e = explode('@', Input::get('email'));
		return array_pop($e);
	}

	public function displayPic()
	{
		return 'media/img/avatar-blank.jpg';
	}
}
