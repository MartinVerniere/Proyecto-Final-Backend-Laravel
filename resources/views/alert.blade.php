@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<p>{{ $message }}</p>
	</div>
@endif

@if ($message = Session::get('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<p>{{ $message }}</p>
	</div>
@endif
