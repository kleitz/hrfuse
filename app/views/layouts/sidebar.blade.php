<div class="panel panel-default">
	<div class="panel-heading" style="padding-left: 10px;">
		<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> {{{ ucfirst(Auth::user()->username) }}}</h3>
	</div>
	<div class="list-group">
		@if (Route::currentRouteName() == 'profile')
			<a class="list-group-item active" href="{{ route('profile') }}">Profile</a>
		@else
			<a class="list-group-item" href="{{ route('profile') }}">Profile</a>
		@endif
		@if (Route::currentRouteName() == 'profile.addresses')
			<a class="list-group-item nested active" href="{{ route('profile.addresses') }}">Addresses</a>
		@else
			<a class="list-group-item nested" href="{{ route('profile.addresses') }}">Addresses</a>
		@endif
	</div>
</div>