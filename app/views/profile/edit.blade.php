@extends('layouts.master')

@section('title')
	Profile -- Edit // HRFuse
@stop

@section('content')
	<div class="container">
		{{ Form::open() }}
		<div class="row">
			<div class="col-xs-3">
				@include('layouts.sidebar')
				{{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block btn-sm']) }}
			</div>
			<div class="col-xs-9">
				<div class="row">
					<div class="col-xs-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Personal Information</h3>
							</div>
							<div class="panel-body">
								{{ Form::strapText('first_name', 'First Name', true, Auth::user()->profile->first_name) }}
								{{ Form::strapText('last_name', 'Last Name', true, Auth::user()->profile->last_name) }}
								<hr />
								{{ Form::strapText('position', 'Position', true, Auth::user()->profile->position) }}
								<hr />
								<div class="form-group">
									{{ Form::label('dob', 'Date of Birth') }}
									<div class="row">
										<div class="col-xs-5">
											{{ Form::selectMonth('month', Auth::user()->profile->dob->month, ['class' => 'form-control']) }}
										</div>
										<div class="col-xs-3">
											{{ Form::selectRange('day', 1, 31, Auth::user()->profile->dob->day, ['class' => 'form-control']) }}
										</div>
										<div class="col-xs-4">
											{{ Form::selectYear('year', 1900, date('Y'), Auth::user()->profile->dob->year, ['class' => 'form-control']) }}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Contact Information</h3>
							</div>
							<div class="panel-body">
								{{ Form::strapText('email', 'Public Email', true, Auth::user()->profile->email) }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{ Form::close() }}
	</div>
@stop