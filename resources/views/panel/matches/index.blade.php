@extends('layouts.panel')
@section('content')
<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			Matches
			<div class="pull-right">
				<a href="{{ route('matches.create') }}" class="btn btn-primary btn-xs">CREATE MATCH</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>Match Name</th>
					<th>Home Team</th>
					<th>Guest Team</th>
					<th>Start At</th>
					<th>Option</th>
				</thead>
				<tbody>
					@foreach($matches as $match)
					<tr>
						<td>{{ $match->title }}</td>
						<td>{{ $match->homeTeam->name or '-' }}</td>
						<td>{{ $match->guestTeam->name or '-' }}</td>
						<td>{{ $match->start_at->format('Y / m / d - h:i A') }}</td>
						<td style="width: 120px;">
							<a href="{{ route('matches.edit',$match->id) }}" class="btn btn-primary btn-xs">Edit</a>
							<form action="{{ route('matches.destroy',$match->id) }}" method="post" style="display: inline-block">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-danger btn-xs">Remove</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection