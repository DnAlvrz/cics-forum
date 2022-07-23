<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }

    public function index () {
        $posts = Post::latest()->paginate(15);
        return view('posts.index', [
            'posts'=>$posts
        ]);
    }

    public function show (Post $post) {
        $comments = $post->comments()->paginate(10);
        return view('posts.post',['post'=>$post, 'comments'=>$comments]);
    }

    public function create () {
        if(Auth::check()) {
            return view('posts.newpost');
        }
        return back();
    }

    public function store (Request $request) {
        $this->validate($request, [
            'title'=> 'required',
            'description'=>'required',
            'type'=>'required',
            'category'=>'required'
        ]);

        auth()->user()->posts()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'type'=>$request->type,
            'category'=>$request->category
        ]);
        
        return back()->with('status', 'Thread was posted');
    }

    public function edit (Post $post) {

        if(Auth::check()) {
            return view('posts.updatepost', [
                'post'=>$post
            ]);
        }
        return back();
    }
    
    public function update (Request $request, Post $post) {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        $post->update($request->all());
        return back()->with('status', 'Post was updated successfully');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts');
    }

    public function mark(Post $post, Comment $comment)
    {
        $post->mark($comment);
        return back()->with('status', 'Comment Marked.');
    }
    public function search(Request $request) {
        $query = request()->query('query');
        $posts = Post::where('title', 'Like', "%{$query}%")->paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    public function hardware() {
        $posts = Post::where('category', '=', "hardware")->paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    public function software() {
        $posts = Post::where('category', '=', "software")->paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    public function programming() {
        $posts = Post::where('category', '=', "programming")->paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    public function microcontrollers() {
        $posts = Post::where('category', '=', "microcontrollers")->paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    public function editing() {
        $posts = Post::where('category', '=', "editing")->paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }
}
