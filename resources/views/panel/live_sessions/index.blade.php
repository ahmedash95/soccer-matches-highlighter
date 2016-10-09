@extends('layouts.panel')
@section('content')
<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">Matches Live Sessions</div>
		<div class="panel-body">
			<strong>Matches Table</strong>
			<table class="table table-bordered">
				<thead>
					<th>Match</th>
					<th>Home Team</th>
					<th>Guest Team</th>
					<th>Start Time</th>
					<th>Time Count Down</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($matches as $match)
					<tr>
						<td>{{ $match->title }}</td>
						<td>{{ $match->homeTeam->name or '-' }}</td>
						<td>{{ $match->guestTeam->name or '-' }}</td>
						<td>{{ $match->start_at->format('Y / m / d - h:i A') }}</td>
						<td><div class="count_down" data-match-time="{{ $match->start_at }}"></div></td>
						<td class="text-center">
							<a href="{{ route('live-sessions.start',$match-> id) }}" class="btn btn-primary btn-xs">Start Session</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
<script type="text/javascript">
	$('.count_down').each(function(){
		el = $(this);
		date = el.data('match-time');
		el.countdown(date,function(event){
			$(this).text(
      			event.strftime('%D days %H:%M:%S')
    		);
		});
	});
</script>
@endsection