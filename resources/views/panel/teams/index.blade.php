@extends('layouts.panel')
@section('content')
<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			Teams
			<div class="pull-right">
				<a href="{{ route('teams.create') }}" class="btn btn-primary btn-xs">CREATE TEAM</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>Team Name</th>
					<th>Option</th>
				</thead>
				<tbody>
					@foreach($teams as $team)
					<tr>
						<td>{{ $team->name }}</td>
						<td style="width: 120px;">
							<a href="{{ route('teams.edit',$team->id) }}" class="btn btn-primary btn-xs">Edit</a>
							<form action="{{ route('teams.destroy',$team->id) }}" method="post" style="display: inline-block">
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