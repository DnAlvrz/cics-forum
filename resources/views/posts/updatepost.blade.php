@extends('layouts.app')
@section('content')
<div class="container" style="padding:30px;">
    @if(session()->has('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="padding: 10px; margin-bottom: 10px;">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card" id="new-post-form">
        <div class="card-body">
            <h5 class="card-title">Edit Thread</h5>
            <form action="{{route('edit', $post)}}" method="post">
                @csrf
				@method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        <p class="text-danger">{{$message}}</p>
                    </div>
                    @enderror
                    @error('type')
                    <div class="text-red-500 mt-2 text-sm">
                        <p class="text-danger">{{$message}}</p>
                    </div>
                    @enderror
                    <div class="input-group mb-2">

                        <div class="input-group-prepend">
                            <select name="type" id="type" class="form-control" default="{{$post->type}}">
                                <option>Question</option>
                                <option>Urgent</option>
                                <option>Guide</option>
                                <option>Tutorial</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="editor" rows="3">{!!$post->description !!}</textarea>
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
