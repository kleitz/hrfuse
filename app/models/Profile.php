<?php

use LaravelBook\Ardent\Ardent as Ardent;

class Profile extends Ardent {

	public function user()
	{
		return $this->belongsTo('User');
	}
}