@extends('layouts.panel')
@section('content')
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			CREATE MATCH
		</div>
		<div class="panel-body">
			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			<form action="{{ route('matches.store') }}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="#">Match Name</label>
					<input type="text" name="name" class="form-control" placeholder="ex : World Cup">
				</div>
				<div class="form-group">
					<p><label for="#">Start At</label></p>
					<div class="col-md-6">
						<input type="date" name="start_at_date" class="form-control">						
					</div>
					<div class="col-md-6">
						<input type="time" name="start_at_time" class="form-control">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="#">Home Team</label>
					<select type="text" name="home_team" class="form-control">
						@foreach($teams as $team)
						<option value="{{ $team->id }}">{{ $team->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="#">Guest Team</label>
					<select type="text" name="guest_team" class="form-control">
						@foreach($teams as $team)
						<option value="{{ $team->id }}">{{ $team->name }}</option>
						@endforeach
					</select>
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