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
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{ ucfirst(Auth::user()->username) }}} ({{{ Auth::user()->email }}}) <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</div>