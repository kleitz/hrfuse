@extends('layouts.master')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				@include('layouts.messages')
				{{ Form::open(['url' => 'auth/login', 'id' => 'loginform']) }}
				{{ Form::hidden('redirect', Route::currentRouteName()) }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title text-center">Login with your CreatorsCast Account</h4>
					</div>
					<div class="panel-body">
						{{ Form::strapText('identity', 'Username or Email', true) }}
						{{ Form::strapPassword('password', 'Password') }}
					</div>
					<div class="panel-footer clearfix">
						{{ Form::submit('Login', ['class' => 'btn btn-primary pull-right']) }}
					</div>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop

@section('scripts')
	<script src="{{ asset('js/vendor/validator.js') }}"></script>
	<script type="text/javascript">
		$('#loginform').bootstrapValidator({
			submitButtons: 'input[type="submit"]',
			fields: {
				identity: {
					validators: {
						notEmpty: {
							message: 'Please enter your username or email address.'
						}
					}
				},
				password: {
					validators: {
						notEmpty: {
							message: 'Please enter your password.'
						}
					}
				}
			}
		});
	</script>
@stop
