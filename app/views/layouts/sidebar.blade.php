<ul class="nav nav-sidebar">
	@if (Request::is('directory'))
		<li class="active"><a href="{{ route('directory') }}"><i class="fa fa-sitemap"></i> Directory</a></li>
	@else
		<li><a href="{{ route('directory') }}"><i class="fa fa-sitemap"></i> Directory</a></li>
	@endif
</ul>
<ul class="nav nav-sidebar">
	@if (Request::is('profile'))
		<li class="active"><a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
	@else
		<li><a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
	@endif
	@if (Request::is('profile/edit'))
		<li class="active subitem"><a href="{{ route('profile.edit') }}"><i class="fa fa-pencil"></i> Edit</a></li>
	@else
		<li class="subitem"><a href="{{ route('profile.edit') }}"><i class="fa fa-pencil"></i> Edit</a></li>
	@endif
	@if (Request::is('profile/addresses'))
		<li class="active subitem"><a href="{{ route('profile.addresses') }}"><i class="fa fa-home"></i> Addresses</a></li>
	@else
		<li class="subitem"><a href="{{ route('profile.addresses') }}"><i class="fa fa-home"></i> Addresses</a></li>
	@endif
</ul>
@if (Auth::user()->is('Admin'))
	<ul class="nav nav-sidebar">
		@if (Request::is('admin'))
			<li class="active"><a href="{{ route('admin') }}"><i class="fa fa-gears"></i> Admin</a></li>
		@else
			<li><a href="{{ route('admin') }}"><i class="fa fa-gears"></i> Admin</a></li>
		@endif
	</ul>
@endif