@extends('layouts.master')

@section('title')
	Directory // HRFuse
@stop

@section('content')
	<div class="container">
		@foreach (array_chunk($users->all(), 2) as $users)
			<div class="row">
				@foreach($users as $user)
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-3">
										{{-- @TODO: Clean this up --}}
										<img src="{{ "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user->profile->email))) . "?d=" . urlencode("http://placehold.it/250x250.png?text=no%20picture") . "&s=250" }}" class="img-responsive img-rounded" />
									</div>
									<div class="col-xs-9">
										<h2>{{{ $user->profile->first_name }}} {{{ $user->profile->last_name }}} <small>{{{ $user->profile->position }}}</small></h2>
										<h5 class="text-muted"><i class="fa fa-fw fa-envelope"></i> {{{ $user->profile->email }}}</h5>
										<h5 class="text-muted"><i class="fa fa-fw fa-calendar"></i> {{{ $user->profile->dob->age }}} years old</h5>
									</div>
								</div>
							</div>
							<div class="panel-footer clearfix">
								<div class="pull-left">
									@if ($user->profile->twitter)
										<a class="btn btn-xs btn-twitter" href="http://twitter.com/{{{ str_replace('@', '', $user->profile->twitter) }}}"><i class="fa fa-twitter"></i> {{{ $user->profile->twitter }}}</a>
									@endif
									@if ($user->profile->facebook)
										<a class="btn btn-xs btn-facebook" href="http://facebook.com/{{{ $user->profile->facebook }}}"><i class="fa fa-facebook"></i> {{{ $user->profile->facebook }}}</a>
									@endif
									@if ($user->profile->googleplus)
										<a class="btn btn-xs btn-google-plus" href="http://plus.google.com/{{{ str_replace('@', '', $user->profile->googleplus) }}}"><i class="fa fa-google-plus"></i> {{{ $user->profile->googleplus }}}</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
		<div class="row">
			<div class="col-md-12 text-center">
				{{ User::paginate(10)->links() }}
			</div>
		</div>
	</div>
@stop