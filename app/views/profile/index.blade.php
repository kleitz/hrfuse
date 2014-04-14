@extends('layouts.master')

@section('title')
	Profile // HRFuse
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-2">
								{{-- @TODO: Clean this up --}}
								<img src="{{ "http://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->profile->email))) . "?d=" . urlencode("http://placehold.it/250x250.png?text=no%20picture") . "&s=250" }}" class="img-responsive img-rounded" />
							</div>
							<div class="col-xs-10">
								<h2>{{{ Auth::user()->profile->first_name }}} {{{ Auth::user()->profile->last_name }}} <small>{{{ Auth::user()->profile->position }}}</small></h2>
								<h5 class="text-muted"><i class="fa fa-fw fa-envelope"></i> {{{ Auth::user()->profile->email }}}</h5>
								<h5 class="text-muted"><i class="fa fa-fw fa-calendar"></i> {{{ Auth::user()->profile->dob->age }}} years old</h5>
							</div>
						</div>
					</div>
					<div class="panel-footer clearfix">
						<div class="pull-left">
							@if (Auth::user()->profile->twitter)
								<a class="btn btn-xs btn-twitter" href="http://twitter.com/{{{ str_replace('@', '', Auth::user()->profile->twitter) }}}"><i class="fa fa-twitter"></i> {{{ Auth::user()->profile->twitter }}}</a>
							@endif
							@if (Auth::user()->profile->facebook)
								<a class="btn btn-xs btn-facebook" href="http://facebook.com/{{{ Auth::user()->profile->facebook }}}"><i class="fa fa-facebook"></i> {{{ Auth::user()->profile->facebook }}}</a>
							@endif
							@if (Auth::user()->profile->googleplus)
								<a class="btn btn-xs btn-google-plus" href="http://plus.google.com/{{{ str_replace('@', '', Auth::user()->profile->googleplus) }}}"><i class="fa fa-google-plus"></i> {{{ Auth::user()->profile->googleplus }}}</a>
							@endif
						</div>
						<div class="pull-right">
							<a class="btn btn-xs btn-primary" href="{{ route('profile.edit') }}"><i class="fa fa-pencil"></i> Edit Profile</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop