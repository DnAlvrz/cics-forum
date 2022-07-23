@extends('layouts.app')

@section('content')


{{-- <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="#">What's new</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">New Posts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">New Profile posts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Latest Activity</a>
    </li>

        

</ul> --}}
<div class="card">
    <div class="card-body">

        <div class="mt-3 mb-3">
            <a class="btn btn-primary" href="{{route('create')}}">Add a discussion</a>
        </div>

        <ul class="list-group">

            @if ($posts->count()>=1)
            @foreach ($posts as $post)

            <li class="list-group-item " style="width:100%;">

                <div class="media">
                    <img src="../images/asd.png" class="mr-3 avatar rounded" alt="...">
                    <div class="media-body">
                        <div class=row>
                            <div class="col-md-9" style="margin:auto;">
                                <span class="badge 
                                    @if($post->bestReply) 
                                        badge-success 
                                    @elseif($post->type=="Urgent")
                                        badge-danger
                                    @elseif($post->type=="Tutorial")
                                        badge-dark
                                    @elseif($post->type=="Guide")
                                        badge-info
                                    @else
                                        badge-primary
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
                                <h5 class="mt-0"><a href="{{route('posts.post', $post->id)}}">{{$post->title}}</a></h5>
                                <a href="{{route('profile', $post->user)}}">
                                    Started by {{$post->user->firstname}} ,
                                    <span>{{$post->created_at->diffForHumans()}}</span>
                                </a>
                            </div>
                            <div class="col-md-2" style="margin:auto;">
                                <p>Replies: {{$post->comments->count()}}</p>
                            </div>
                            <div class="col-md-1" style="margin:auto;">
                                <img src="../images/asd.png" class="avatar rounded" alt="...">
                            </div>
                        </div>

                    </div>
                </div>
            </li>
            @endforeach
            <div class="mx-auto">
                {{$posts->links()}}
            </div>

            @else
            There are no posts!
            @endif
        </ul>
    </div>
</div>



@endsection
