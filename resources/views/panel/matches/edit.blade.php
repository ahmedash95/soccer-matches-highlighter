@extends('layouts.panel')
@section('content')
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			EDIT MATCH [ {{ $match->title }} ]
		</div>
		<div class="panel-body">
			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			<form action="{{ route('matches.update',$match->id) }}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="PUT">
				<div class="form-group">
					<label for="#">Match Name</label>
					<input type="text" name="name" class="form-control" value="{{ $match->title }}" placeholder="ex : World Cup">
				</div>
				<div class="form-group">
					<p><label for="#">Start At</label></p>
					<div class="col-md-6">
						<input type="date" name="start_at_date" class="form-control" value="{{ date('Y-m-d',strtotime($match->start_at)) }}">						
					</div>
					<div class="col-md-6">
						<input type="time" name="start_at_time" class="form-control" value="{{ date('G:i',strtotime($match->start_at)) }}">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="#">Home Team</label>
					<select type="text" name="home_team" class="form-control">
						@foreach($teams as $team)
							@if($match->home_team == $team->id)
							<option value="{{ $team->id }}" selected>{{ $team->name }}</option>
							@else
							<option value="{{ $team->id }}">{{ $team->name }}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="#">Guest Team</label>
					<select type="text" name="guest_team" class="form-control">
					@foreach($teams as $team)
						@if($match->guest_team == $team->id)
							<option value="{{ $team->id }}" selected>{{ $team->name }}</option>
						@else
							<option value="{{ $team->id }}">{{ $team->name }}</option>
						@endif
					@endforeach
					</select>
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