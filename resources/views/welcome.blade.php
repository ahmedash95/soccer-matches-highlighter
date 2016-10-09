@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
			<!-- NEXT MATCH -->
            <div class="panel panel-default">
                <div class="panel-heading">
                	Next Match
                	<div class="pull-right">
                		<strong>Match Time:</strong>&nbsp;&nbsp;&nbsp; {{ $nextMatch->start_at->format('m / d  -  h:i a') }}
                	</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-5 text-center">
                    	<h1>{{ $nextMatch->homeTeam->name or '-' }}</h1>
                    </div>
                    <div class="col-md-2 text-center">
                    	<h1>VS</h1>
                    </div>
                    <div class="col-md-5 text-center">
                    	<h1>
                    		{{ $nextMatch->guestTeam->name or '-' }}
                    	</h1>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-right">
                    	<a href="{{ route('match.live',$nextMatch->id) }}" class="btn btn-primary btn-xs">Live Highlights</a>
                    </div>
                </div>
            </div>
			<!-- END NEXT MATCH -->
			<!-- Next 5 MATCH -->
			<div class="panel panel-default">
				<div class="panel-heading">Next 5 Matches</div>
				<div class="panel-body">
					<table class="table table-bordered text-center">
						<thead>
							<th class="text-center">Home Team</th>
							<th class="text-center">Guest Team</th>
							<th class="text-center">Match at</th>
						</thead>
						<tbody>
						@foreach($nextFiveMatches as $match)
							<tr>
								<th>{{ $match->homeTeam->name or '-' }}</th>
								<th>{{ $match->guestTeam->name or '-' }}</th>
								<th>{{ $match->start_at->format('Y / m / d   -  h:i a') }}</th>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!-- END 5 NEXT MATCH -->
        </div>
    </div>
</div>
@endsection
