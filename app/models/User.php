<?php

use Toddish\Verify\Models\User as VerifyUser;

class User extends VerifyUser {

	// Set the connection to the CreatorsCast database for user info
	protected $connection = 'creatorscast';

}