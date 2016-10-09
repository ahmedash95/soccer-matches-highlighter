@extends('layouts.panel')
@section('content')
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			CREATE TEAM
		</div>
		<div class="panel-body">
			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			<form action="{{ route('teams.store') }}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="#">Team Name</label>
					<input type="text" name="name" class="form-control" placeholder="ex : Al Ahly">
				</div>
				<hr>
				<div class="pull-right">
					<button class="btn btn-primary btn-xs">Save</button>
				</div>
			</form>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection