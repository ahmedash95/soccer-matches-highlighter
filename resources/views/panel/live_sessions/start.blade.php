@extends('layouts.panel')
@section('content')
<div class="col-md-10 col-md-offset-1" id="MatchLiveSession">
	<div class="panel panel-default">
		<div class="panel-heading">
			Match Live Session [ {{ $match->title }} ]
			<div class="pull-right">
				{{ $match->start_at->format('h:i a') }}
				=>
				{{ $match->end_at->format('h:i a') }}
			</div>
		</div>
		<div class="panel-body">
			<div class="alert alert-warning">
				<p><strong>Note: </strong> your comments is in real time , so be careful for what you are posting for 	watchers</p>
			</div>
			<hr>
			<p><strong>Comments (@{{ comments.length }})</strong></p>
			<div class="comments-box">
				<div v-for="comment in comments" class="single-comment">
					<p><strong>Comment: </strong> @{{ comment.comment }} </p>
					<p><strong>Comment Type: </strong> @{{ comment.type }} </p>
					<p><strong>Comment For Team: </strong> @{{ comment.team ? comment.team.name : '-' }} </p>
					<p><strong>Comment Time: </strong> @{{ comment.comment_time }} </p>
					<p><strong>Comment At: </strong> @{{ comment.created_at }} </p>
					<hr>
				</div>
			</div>
			<hr>
			<div class="post-comment">
			<form action="{{ route('live-sessions.comment',$match->id) }}" method="post" v-on:submit.prevent="postComment">
				<input type="hidden" v-model="form._token" value="{{ csrf_token() }}">
				<div class="col-md-12">
					<textarea v-model="form.comment" class="form-control" cols="30" rows="4" placeholder="comment"></textarea>
				</div>
				<div class="col-md-3">
					<br>
					comment type : 
					<select v-model="form.comment_type" id="" class="form-control">
						@foreach($comment_types as $id => $type)
							<option value="{{ $id }}">{{ ucfirst($type) }}</option>
						@endforeach	
					</select>
				</div>
				<div class="col-md-3">
					<br>
					for team
					<select v-model="form.team" class="form-control">
						<option value="0" selected>-</option>
						<option value="{{ $match->homeTeam->id }}">{{ $match->homeTeam->name }}</option>
						<option value="{{ $match->guestTeam->id }}">{{ $match->guestTeam->name }}</option>
					</select>
				</div>
				<div class="col-md-3 pull-right text-right">
					<br><br>
					<button class="btn btn-primary">Post Comment</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>
<script>
	var app = new Vue({
	  el: '#MatchLiveSession',
	  data: {
	    comments : {!! $match->liveSessions !!},
	    form : {}
	  },
	  methods : {
	  	postComment : function(e){
	  		var formAction = e.target.action;
	  		this.$http.post(formAction,this.form).then(function(response){
	  			app.comments.push(response.data.comment);
	  		});
	  	}
	  }
})
</script>
@endsection
