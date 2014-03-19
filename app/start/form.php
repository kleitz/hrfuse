<?php

/*
|--------------------------------------------------------------------------
| Form Macros
|--------------------------------------------------------------------------
|
| Create the bindings for form macros.
|
*/

Form::macro('strapText', function($field, $label, $old = FALSE)
{
	// Define label
	$input_label = Form::label($field, $label);

	// Define form field
	if ($old) $input = Form::text($field, Input::old($field) ? Input::old($field) : null, ['placeholder' => $label, 'class' => 'form-control']);
	else $input = Form::text($field, null, ['placeholder' => $label, 'class' => 'form-control']);

	// Get errors from the session
	$errors = Session::get('errors');

	if ($errors && $errors->has($field))
	{
		$error = '<small class="help-block">' . $errors->first($field) . '</small>';

		return '<div class="form-group has-error">' . $input_label . $input . $error . '</div>';
	}
	else
	{
		return '<div class="form-group">' .  $input_label . $input . '</div>';
	}
});

Form::macro('strapPassword', function($field, $label)
{
	// Define label
	$input_label = Form::label($field, $label);

	// Define form field
	$input = Form::password($field, ['placeholder' => $label, 'class' => 'form-control']);

	// Get errors from the session
	$errors = Session::get('errors');

	if ($errors && $errors->has($field))
	{
		$error = '<small class="help-block">' . $errors->first($field) . '</small>';

		return '<div class="form-group has-error">' . $input_label . $input . $error . '</div>';
	}
	else
	{
		return '<div class="form-group">' .  $input_label . $input . '</div>';
	}
});