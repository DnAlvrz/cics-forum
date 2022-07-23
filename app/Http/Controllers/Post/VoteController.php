<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{
    public function __construct () {
        $this->middleware(['auth']);
    }

    public function vote(Request $request, Post $post, Comment $comment) {
        if($comment->votedBy($request->user())) {
            return respone(null, 403);
        }
        $comment->votes()->create([
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    public function destroy(Request $request, Post $post, Comment $comment)
    {
        $comment->votes()->where('comment_id', $comment->id)->delete();

        return back();
    }
}
