<?php

use LaravelBook\Ardent\Ardent as Ardent;

class Profile extends Ardent {

	protected $dates = ['dob'];

	public static $rules = array(
		'twitter' => 'regex:/\A[@]/',
		'googleplus' => 'regex:/\A[+]/',
	);

	public function user()
	{
		return $this->belongsTo('User');
	}
}