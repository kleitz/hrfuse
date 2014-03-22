<?php

use Toddish\Verify\Models\User as VerifyUser;

class User extends VerifyUser {

	public static function boot()
	{
		parent::boot();

		// Make a profile when the user is created
		User::created(function($user)
		{
			$profile = new Profile;
			$profile->first_name = $user->username;
			$profile->email = $user->email;
			$user->profile()->save($profile);
		});
	}

	public function addresses()
	{
		return $this->hasMany('Address');
	}

	public function profile()
	{
		return $this->hasOne('Profile');
	}
}