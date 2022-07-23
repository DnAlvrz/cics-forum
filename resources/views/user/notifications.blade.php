@extends('layouts.app')
@section('content')
<div class="container">

	<div class="card">
		<div class="card-header">
		 <h2 class="text-center"> Notifications</h2>
		</div>
		<ul class="list-group list-group-flush">
			@if($notifications->count() > 0)
				@foreach($notifications as $notification)
				<li class="list-group-item">
					@if($notification->type='App\Notifications\PostReplied') 
					{{$notification->data['post']['user']['firstname']}} replied to your post "{{$notification->data['post']['title']}}""
					<a href="{{route('posts.post', $notification->data['post']['id'])}}" class="btn btn-info float-right">View</a>
					@endif
				</li>
				@endforeach
			@else 
			There are no posts
			@endif
		  </ul>
		<div class="card-footer text-muted">
			<div class="mx-auto">
				{{-- {{$posts->links()}} --}}
			</div>
		</div>
	  </div>
</div>
@endsection
