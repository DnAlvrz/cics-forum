<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Notifications\PostReplied;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function comment (Request $request, Post $post) {

        $this->validate($request, [
            'comment'=> 'required',
        ]);

        $post->comments()->create([
            'body'=>$request->comment,
            'user_id'=>auth()->user()->id,
        ]);
        $post->user->notify(new PostReplied($post));
        
        return back()->with('status', 'Question was posted');
    }
    
    public function edit (Comment $comment) {

        if(Auth::check()) {
            return view('posts.editcomment', [
                'comment'=>$comment
            ]);
        }
        return back();
    }

    public function update (Request $request, Comment $comment) {
        $this->validate($request,[
            'body' => 'required'
        ]);
        $comment->update($request->all());
        return back()->with('status', 'Comment was updated successfully');
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }

}
