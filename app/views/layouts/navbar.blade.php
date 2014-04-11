<div class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ url('/') }}" class="navbar-brand">HRFuse</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{ route('directory') }}">Directory</a></li>
			</ul>
			<div class="navbar-right">
				@if (Auth::check())
					<div class="btn-group navbar-btn">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">{{{ ucfirst(Auth::user()->username) }}} ({{{ Auth::user()->email }}})</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
							<li class="divider"></li>
							<li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
						</ul>
					</div>
				@else
					<a class="btn btn-primary navbar-btn" href="{{ route('auth.login') }}">Login</a>
				@endif
			</div>
		</div>
	</div>
</div>