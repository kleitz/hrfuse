<?php

use Toddish\Verify\Models\User as VerifyUser;

class User extends VerifyUser {

	public function addresses()
	{
		return $this->hasMany('Address');
	}
}