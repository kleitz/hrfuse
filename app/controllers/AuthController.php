<?php

class AuthController extends BaseController {

	public function getLogin()
	{
		return View::make('auth.login');
	}

	public function postLogin()
	{
		// Define validation rules
		$rules = array(
			'identity' => 'required',
			'password' => 'required',
		);

		// Make the validation
		$validation = Validator::make(Input::all(), $rules);

		if ($validation->passes())
		{
			try
			{
				// Try to log the user in
				Auth::attempt(['identifier' => Input::get('identity'), 'password' => Input::get('password')], true);
			}
			catch (Exception $e)
			{
				// Catch an exception and redirect with the error message
				return Redirect::route('auth.login')
					->withInput(Input::except('password'))
					->withErrors([$e->getMessage()]);
			}

			// The user was logged in, so redirect them to their intended destination
			if (Input::has('redirect')) return Redirect::route(Input::get('redirect'));

			return Redirect::intended('/')->with('messages', ['Successfully logged in.']);
		}

		// Something screwed up, display errors
		return Redirect::route('auth.login')
			->withInput(Input::except('password'))
			->withErrors($validation);
	}

	public function getLogout()
	{
		Auth::logout();

		return Redirect::to('/')->with('messages', ['Successfully logged out.']);
	}
}