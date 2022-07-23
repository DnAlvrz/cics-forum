@extends('layouts.app')
@section('content')
<div class="container py-5>
	@if(session('status'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert" style="padding: 10px; margin-bottom: 10px;">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
	@endif
    <div class="card">
        <div class="card-header">
            <h5>
                <span class="badge @if($post->bestReply != null) badge-success @elseif($post->type=="Question")
                    badge-primary
                    @elseif($post->type=="Urgent")
                    badge-danger
                    @elseif($post->type=="Tutorial")
                    badge-dark
                    @elseif($post->type=="Guide")
                    badge-info
                    @endif
                    ">
                    [
                        @if ($post->bestReply != null)
                        SOLVED
                        @else
                        {{$post->type}}
                        @endif
                        ]
                    </span>
                <span style="font-size:12px;">{{$post->created_at->diffForHumans()}}<span>
            </h5>
            <h3 class="card-title"> {{$post->title}}</h3>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-md-2 user-sect">
                    <div style="display: block; margin:auto;">
                        <img src="/images/asd.png" style="display: block;" class="avatar-1 rounded" alt="...">
                    </div>
                    <div style=" text-align:center; padding:10px;">
                        <a href="#" style="">{{$post->user->firstname}}</a>
                        <p style="padding:0; margin:0;" p>Posts: {{$post->user->posts->count()}}</p>
                        <p style="padding:0; margin:0;">Replies: {{$post->user->comments->count()}}</p>
                        <p style="padding:0; margin:0;">Upvotes: {{$post->user->votes->count()}}</p>
                        @if($post->ownedBy(auth()->user()))
                        <a href="{{route('edit', $post)}}">Edit</a>
                        <form action="{{route('post.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <p>
                                <button class="btn-vote" style="padding:0; margin:10;" type="submit" href="#">
                                    <i class="far fa-thumbs-down"></i> Delete
                                </button>
                            </p>
                        </form> 
                        @endif
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="description" style="margin-top: 30px">
                        {!! $post->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Best Reply -->
	@if($post->bestReply)
	<div class="card text-white bg-primary " style="margin: 10px 0 10px 0;">
        <div class="card-header">
            <h3 class="card-title text-center"> Best Answer</h3>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-md-2 user-sect">
                    <div style="display: block; margin:auto;">
                        <img src="/images/asd.png" style="display: block;" class="avatar-1 rounded" alt="...">
                    </div>
                    <div style=" text-align:center; padding:10px;">
                        <a href="#" style="color: #fff;">{{$post->bestReply->user['firstname']}}</a>
                        
                        <p style="padding:0; margin:0;"> Posts: {{$post->bestReply->user['posts']->count()}}</p>
                        <p style="padding:0; margin:0;"> Replies: {{$post->bestReply->user['comments']->count()}}</p>
                        <p style="padding:0; margin:0;"> Upvotes: {{$post->bestReply->user['votes']->count()}}</p>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="description" style="margin-top: 30px">
                        {!! $post->bestReply->body!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
	@endif
	<!-- Comments -->
    @foreach($comments as $comment)
    <div class="card" style="margin:10px 0px 10px 0px;">
        @if($post->ownedBy(auth()->user()))
        <div class="card-header">
            <form action="{{route('bestreply',  ['post'=>$post, 'comment'=>$comment])}}" method="post">
				@csrf
                <input type="submit" class="btn btn-primary float-right" value="Mark as Best Reply">
				
			</form>

        </div>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 user-sect">
                    <div style="display: block; margin:auto;">
                        <img src="/images/asd.png" style="display: block;" class="avatar-1 rounded" alt="...">
                    </div>
                    <div style=" text-align:center; padding:10px;">
                        <a href="#" style="">{{$comment->user->firstname}}</a>
                        <p style="padding:0; margin:0;" p>Posts: {{$comment->user->posts->count()}}</p>
                        <p style="padding:0; margin:0;">Replies: {{$comment->user->comments->count()}}</p>
                        <p style="padding:0; margin:0;">Upvotes: {{$comment->user->votes->count()}}</p>
                        @if($comment->ownedBy(auth()->user()))
                        <a href="{{route('comment.edit', $comment)}}">Edit</a>
                        <form action="{{route('comment.destroy', $comment)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <p>
                                <button class="btn-vote" style="padding:0; margin:10;" type="submit" href="#">
                                    <i class="far fa-thumbs-down"></i> Delete
                                </button>
                            </p>
                        </form> 
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <span>{{$comment->created_at->diffForHumans()}}<span>
					<div class="description" style="margin-top: 30px">
						{!!$comment->body !!}
					</div>

                </div>
				
                <div class="col-md-2">
                    <div>
                        <p>
                            {{$comment->votes->count()}}
                            {{ Str::plural('vote', $comment->votes->count() )}}
                        </p>
                        @if(!($comment->votedBy(auth()->user())))
                        <form action="{{route('comment.vote',[ $post, $comment])}}" method="post">
                            @csrf
                            <p>
                                <button class="btn-vote" style="padding:0; margin:10;" type="submit" href="#"><i
                                        class="far fa-thumbs-up"></i> Vote</button>
                            </p>
                        </form>
                        @else 
                        <form action="{{route('comment.unvote',[ $post, $comment])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <p>
                                <button class="btn-vote" style="padding:0; margin:10;" type="submit" href="#"><i
                                        class="far fa-thumbs-down"></i> Unvote</button>
                            </p>
                        </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
	<div>
		{{$comments->links()}}
	</div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add a comment</h5>
            <form action="{{route('comment',  $post)}}" method="post" style="width:90%; padding-top:20px; margin:auto;">
                @csrf
                <div class="form-group">
                    {{-- <label for="comment">Comment</label> --}}
                    <textarea class="form-control" name="comment" id="editor" placeholder="Enter comment"></textarea>
                    @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        <p class="text-danger">{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>

@endsection
