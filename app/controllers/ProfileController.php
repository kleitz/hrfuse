<?php

class ProfileController extends BaseController {

	public function getAddresses()
	{
		return View::make('profile.addresses');
	}

	public function postAddresses()
	{
		// if we are inputting a new address
		if (Input::get('type') == 'new')
		{
			$address = new Address;
			$address->address_1 = Input::get('address_1');
			$address->address_2 = Input::get('address_2');
			$address->city = Input::get('city');
			$address->state_province = Input::get('state_province');
			$address->country = Input::get('country');
			$address->postalcode = Input::get('postalcode');

			// if the user has no other addresses, this is their primary
			if (Auth::user()->addresses()->count() == 0)
				$address->primary = true;

			if (! Auth::user()->addresses()->save($address))
			{
				return Redirect::route('profile.addresses')->withErrors($address->errors());
			}

			return Redirect::route('profile.addresses')->with('messages', ['Added new address.']);
		}
	}

}