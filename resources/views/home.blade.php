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
        <div class="card-header">
            <h5 class="card-title  text-center">Featured Posts</h5>
        </div>
        <div class="card-body">
            @foreach($posts as $post)
            <div class="media">
                <img src="../images/asd.png" class="mr-3 avatar rounded" alt="...">
                <div class="media-body">
                    <div class=row>
                        <div class="col-md-8" style="margin:auto;">
                            <span class="badge @if ($post->type==" Solved") badge-success @elseif($post->type=="Question")
                                badge-primary
                                @elseif($post->type=="Urgent")
                                badge-danger
                                @elseif($post->type=="Tutorial")
                                badge-dark
                                @elseif($post->type=="Guide")
                                badge-info
                                @endif">{{$post->type}}</span>
                            <h5 class="mt-0"><a href="{{route('posts.post', $post->id)}}">{{$post->title}}</a></h5>
                            <span>Started by {{$post->user->firstname}}, {{$post->created_at->diffForHumans()}} </span>
                        </div>
                        <div class="col-md-2" style="margin:auto;">
                            <div class="row">
                                <div class="col-md-8">
                                    <span>Replies: {{$post->comments->count()}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin:auto;">
                            <img src="images/asd.png" class="avatar rounded" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
       
        </div>
        <div class="card-footer text-muted">
        </div>
        {{$posts->links()}}
    </div>
        

    
@endsection
