@extends('layouts.app')

@section('content')
<div id="main-content">
    @if(session()->has('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="col-lg-8" id="register-form" style="margin:auto; padding-top:50px;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Log in</h5>
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        @error('email')
                        <p class="text-danger">Please enter your email</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Choose a password">
                        @error('password')
                        <p class="text-danger">Please enter your password</p>
                        @enderror
                    </div>

                    <div class="form-check mt-2" style="padding:0; margin:auto;">
                        <input type="checkbox" class="form-chcke-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    <button type="submit" style="margin:auto; width:100%;" class="btn btn-primary">Log in</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
