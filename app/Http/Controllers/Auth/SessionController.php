<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __construct () {
        $this->middleware('auth', ['only'=>'logout']);
        $this->middleware('guest',  ['only'=>'login']);
    }
    public function index() {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
        
    }

    public function authenticate(Request $request) {
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(!(auth()->attempt($credentials, $request->remember))) {
            return back()->with('status', 'Invalid login credentials');
        }
        $request->session()->regenerate();
        return back();
    }

   
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
