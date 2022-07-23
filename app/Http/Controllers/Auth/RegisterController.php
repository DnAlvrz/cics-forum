<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username'=> 'required|max:50',
            'firstname'=> 'required|max:50',
            'lastname'=> 'required|max:50',
            'email'=> 'required|email',
            'password'=> 'required|max:50',
        ]);
        User::create([
            'username'=> $request->username,
            'firstname'=>$request->firstname,
            'lastname'=> $request->lastname,
            'address_one'=> $request->address_one,
            'address_two'=> $request->address_two,
            'city'=> $request->city,
            'province'=> $request->province,
            'zipcode'=> $request->zipcode,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('posts');
    }
}
