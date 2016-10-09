@extends('layouts.app')
@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div class="panel panel-default">
        		<div class="panel-body">
        			@if(strtotime($match->start_at) > time())
						<div class="alert alert-danger">
							The match hasn't started yet .. it will start at {{ $match->start_at->format('Y / M / D - h:i a') }}
						</div>
		        	@else
		        	<h2 class="text-center" id="match_time"></h2>
					<div class="col-md-5 text-center">
                    	<h1>{{ $match->homeTeam->name or '-' }}</h1>
                    </div>
                    <div class="col-md-2 text-center">
                    	<h1>VS</h1>
                    </div>
                    <div class="col-md-5 text-center">
                    	<h1>
                    		{{ $match->guestTeam->name or '-' }}
                    	</h1>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                	<h3><strong>Highlights</strong></h3>
					<div id="comments_box">
						<hr>
						<div class="comment" v-for="comment in comments">
							<div class="col-md-2">
								<p><strong>@{{ comment.team ? comment.team.name : '-' }}</strong></p>
							</div>
							<div class="col-md-8">
								  <strong>@{{ "[ " + comment.type + " ] " }}</strong>
								  @{{ (comment.comment ? ' - ' + comment.comment : '') }}
							</div>
							<div class="col-md-2">
								@{{ comment.comment_time }}
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
					</div>
					@endif
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.5.0/socket.io.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>
<script>
	var app = new Vue({
		el : "#app",
		data : {
			comments : {!! $match->liveSessions !!}
		},
		methods : {
		  	addComment : function(comment){
	  			this.comments.push(comment);
	  		}
	  }
	});
	// listen to scoket
	 var socket = io('http://localhost:3000');
	socket.on("match-{{ $match->id }}:App\\Events\\MatchLiveSession", function(message){
        app.addComment(message.data);
    });

</script>
@endsection