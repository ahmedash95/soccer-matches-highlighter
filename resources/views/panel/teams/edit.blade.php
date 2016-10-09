@extends('layouts.panel')
@section('content')
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			EDIT TEAM [ {{ $team->name }} ]
		</div>
		<div class="panel-body">
			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			<form action="{{ route('teams.update',$team->id) }}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="PUT">
				<div class="form-group">
					<label for="#">Team Name</label>
					<input type="text" name="name" class="form-control" value="{{ $team->name }}" placeholder="ex : Al Ahly">
				</div>
				<hr>
				<div class="pull-right">
					<button class="btn btn-primary btn-xs">Update</button>
				</div>
			</form>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection