@extends('layouts.master')

@section('title')
	Profile // HRFuse
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
				@include('layouts.sidebar')
			</div>
			<div class="col-xs-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-2">
								{{-- @TODO: Clean this up --}}
								<img src="{{ "http://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->profile->email))) . "?d=" . urlencode("http://placehold.it/250x250?text=no%20picture") . "&s=250" }}" class="img-responsive img-rounded" />
							</div>
							<div class="col-xs-10">
								<h2>{{{ Auth::user()->profile->first_name }}} {{{ Auth::user()->profile->last_name }}} <small>{{{ Auth::user()->profile->position }}}</small></h2>
								<h5 class="text-muted"><i class="fa fa-envelope"></i> {{{ Auth::user()->profile->email }}}</h5>
							</div>
						</div>
					</div>
					<div class="panel-footer clearfix">
						<div class="pull-left">
							
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