@extends('layouts.master')

@section('title')
	Profile -- Addresses // HRFuse
@stop

@section('styles')
	<style type="text/css">
		.panel {
			position: relative;
		}
	</style>
@stop

@section('content')
	<div class="container">
		@include('layouts.messages')
		<div class="row">
			<div class="col-xs-12">
				@if (Auth::user()->addresses()->count() == 0)
					<div class="panel panel-default">
						<div class="panel-body">
							<p class="text-muted text-center">No addresses on file.  <a href="#addAddressModal" data-toggle="modal">Add one!</a></p>
						</div>
					</div>
				@else
					@foreach (Auth::user()->addresses as $address)
						@if ($address->primary)
							<div class="panel panel-primary">
							<p class="text-primary" style="position: absolute; right: 8px; top: 8px;">{{{ $address->name }}} (Primary)</p>
						@else
							<div class="panel panel-default">
								<p class="text-muted" style="position: absolute; right: 8px; top: 8px;">{{{ $address->name }}}</p>
						@endif
							<div class="panel-body">
								<h4>{{ $address->address_1 }}</h4>
								@if ($address->address_2)
									<h4>{{ $address->address_2 }}</h4>
								@endif
								<p class="text-muted">{{ $address->city }}, {{ $address->state_province }} {{ $address->postalcode }}</p>
								<p class="text-muted">{{ $address->country }}</p>
							</div>
						</div>
					@endforeach
					<div class="panel panel-default">
						<div class="panel-body">
							<p class="text-muted text-center"><a href="#addAddressModal" data-toggle="modal">Add a new address.</a></p>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>

	<div class="modal fade" id="addAddressModal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				{{ Form::open() }}
				<div class="modal-header">
					<h4 class="modal-title">Add a New Address</h4>
				</div>
				<div class="modal-body">
					{{ Form::token() }}
					{{ Form::hidden('type', 'new') }}
					{{ Form::strapText('name', 'Name this Address', true) }}
					<hr />
					{{ Form::strapText('address_1', 'Address 1', true) }}
					{{ Form::strapText('address_2', 'Address 2', true) }}
					<div class="row">
						<div class="col-xs-7">
							{{ Form::strapText('city', 'City', true) }}
						</div>
						<div class="col-xs-5">
							{{ Form::strapText('state_province', 'State/Province', true) }}
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8">
							{{ Form::strapText('country', 'Country', true) }}
						</div>
						<div class="col-xs-4">
							{{ Form::strapText('postalcode', 'Postal Code/ZIP Code', true) }}
						</div>
					</div>
				</div>
				<div class="modal-footer clearfix">
					<button class="btn btn-link pull-left" data-dismiss="modal">Cancel</button>
					{{ Form::submit('Add Address', ['class' => 'btn btn-primary pull-right']) }}
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop