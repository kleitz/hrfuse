<?php

use LaravelBook\Ardent\Ardent as Ardent;

class Address extends Ardent {

	// gotta be grammatically correct
	protected $table = 'addresses';

	// ardent validation rules
	public static $rules = array(
		'address_1' => 'required',
	    'city' => 'required',
	    'country' => 'required',
	    'postalcode' => 'required',
	);

	public function user()
	{
		return $this->belongsTo('User');
	}
}