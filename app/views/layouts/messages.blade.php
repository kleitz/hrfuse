@if ($errors)
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger">
			{{{ $error }}}
		</div>
	@endforeach
@endif

@if (Session::has('messages'))
	@foreach (Session::get('messages') as $message)
		<div class="alert alert-info">
			{{{ $message }}}
		</div>
	@endforeach
@endif