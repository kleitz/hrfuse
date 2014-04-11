<?php

class ProfileController extends BaseController {

	public function getIndex()
	{
		return View::make('profile.index');
	}

	public function getEdit()
	{
		return View::make('profile.edit');
	}

	public function postEdit()
	{
		$user = Auth::user();
		$user->profile->first_name = Input::get('first_name');
		$user->profile->last_name = Input::get('last_name');
		$user->profile->position = Input::get('position');
		$user->profile->email = Input::get('email');
		$user->profile->dob = Carbon\Carbon::createFromDate(Input::get('year'), Input::get('month'), Input::get('day'))->toDateString();

		if (! $user->profile->save())
		{
			return Redirect::route('profile.edit')->withErrors($user->profile->errors());
		}

		return Redirect::route('profile')->with('messages', ['Updated profile.']);
	}

	public function getAddresses()
	{
		return View::make('profile.addresses');
	}

	public function postAddresses()
	{
		// if we are inputting a new address
		if (Input::get('type') == 'new')
		{
			$address                 = new Address;
			$address->name           = Input::get('name');
			$address->address_1      = Input::get('address_1');
			$address->address_2      = Input::get('address_2');
			$address->city           = Input::get('city');
			$address->state_province = Input::get('state_province');
			$address->country        = Input::get('country');
			$address->postalcode     = Input::get('postalcode');

			// if the user has no other addresses, this is their primary
			if (Auth::user()->addresses()->count() == 0)
			{
				$address->primary = true;
			}

			if (! Auth::user()->addresses()->save($address))
			{
				return Redirect::route('profile.addresses')->withErrors($address->errors());
			}

			return Redirect::route('profile.addresses')->with('messages', ['Added new address.']);
		}
	}

}