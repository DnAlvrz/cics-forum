@extends('layouts.app')

@section('content')
<div class="row" id="main-content">

    <div class="col-md-10" id="register-form" style="margin:auto; padding: 20px; ">
        <div class="card">
            <div class="card-body">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <h5 class="card-title">Register</h5>
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Your Username">
                        @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            <p class="text-danger">{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname"
                                    placeholder="Firstname">
                                @error('firstname')
                                <div class="text-red-500 mt-2 text-sm">
                                    <p class="text-danger">{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" class="form-control" id="lastname"
                                    placeholder="Lastname">
                                @error('lastname')
                                <div class="text-red-500 mt-2 text-sm">
                                    <p class="text-danger">{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            <p class="text-danger">{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Choose a password">
                                @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    <p class="text-danger">{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                <div class="text-red-500 mt-2 text-sm">
                                    <p class="text-danger">{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="address_one">Address</label>
                                <input type="text" class="form-control" name="address_one" id="address_one" placeholder="1234 Main St">
                                @error('address_one')
                                <div class="text-red-500 mt-2 text-sm">
                                    <p class="text-danger">{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="address_two">Address 2</label>
                                <input type="text" class="form-control" name="address_two" id="inputAddress2"
                                    placeholder="Apartment, studio, or floor">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city">
                            @error('city')
                            <div class="text-red-500 mt-2 text-sm">
                                <p class="text-danger">{{$message}}</p>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="province">Province</label>
                            <input type="text" class="form-control"name="province" id="province">
                            @error('province')
                            <div class="text-red-500 mt-2 text-sm">
                                <p class="text-danger">{{$message}}</p>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="zipcode">Zip</label>
                            <input type="text" class="form-control" name="zipcode" id="zipcode">
                            @error('zipcode')
                            <div class="text-red-500 mt-2 text-sm">
                                <p class="text-danger">{{$message}}</p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div style="width:40%; margin:auto;">
                        <button type="submit" style="margin:auto; width:100%;"  class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
