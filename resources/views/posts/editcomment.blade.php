@extends('layouts.app')
@section('content')
<div class="container">
    @if(session()->has('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="padding: 10px; margin-bottom: 10px;">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Reply</h5>
            <form action="{{route('comment.edit', $comment)}}" method="post">
                @csrf
				@method('PUT')
                <div class="form-group">	
                </div>
                <div class="form-group">
                    <label for="body">Comment</label>
                    <textarea class="form-control" name="body" id="editor" >{!! $comment->body !!}</textarea>
                    @error('body')
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
