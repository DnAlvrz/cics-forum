<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(User $user){
        $posts = Post::where("user_id", "=", $user->id)->paginate(15);
        return view('user.index', ['posts'=>$posts]);
    }
    public function notification () {
        auth()->user()->unreadNotifications->markAsRead();

        return view('user.notifications', [
            'notifications'=> auth()->user()->notifications,
        ]);
    }
}
