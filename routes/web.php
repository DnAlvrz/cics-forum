<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\VoteController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[HomeController::class, 'index'])->name('home');


//Auth
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Sessions
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'authenticate']);
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
//User
Route::get('/users/{user:firstname}', [UserController::class, 'index'])->name('profile');
Route::get('/users/{user:firstname}/notifications', [UserController::class, 'notification'])->name('users.user.notifications');

//Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/search', [PostController::class, 'search'])->name('search');
Route::get('/posts/{post:id}', [PostController::class, 'show'])->name('posts.post');
Route::get('/post/create', [PostController::class, 'create'])->name('create');
Route::post('/post/create', [PostController::class, 'store']);
Route::get('/post/{post:id}/edit', [PostController::class, 'edit'])->name('edit');
Route::put('/post/{post:id}/edit', [PostController::class, 'update']);
Route::delete('/posts/{post:id}/delete', [PostController::class, 'destroy'])->name('post.destroy');
Route::post('/posts/{post}/{comment}/mark-as-best-reply', [PostController::class, 'mark'])->name('bestreply');

//Categories
Route::get('/posts/category/hardware', [PostController::class, 'hardware'])->name('hardware');
Route::get('/posts/category/software', [PostController::class, 'software'])->name('software');
Route::get('/posts/category/programming', [PostController::class, 'programming'])->name('programming');
Route::get('/posts/category/microcontrollers', [PostController::class, 'microcontrollers'])->name('mc');
Route::get('/posts/category/editing', [PostController::class, 'editing'])->name('editing');

// Comments / Replies
Route::post('/posts/{post:id}/comment', [CommentController::class, 'comment'])->name('comment');
Route::get('/comment/{comment:id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/comment/{comment:id}/edit', [CommentController::class, 'update']);
Route::delete('/posts/comments/{comment:id}/delete', [CommentController::class, 'destroy'])->name('comment.destroy');

// Votes
Route::post('/posts/{post:id}/{comment:id}/vote', [VoteController::class, 'vote'])->name('comment.vote');
Route::delete('/posts/{post:id}/{comment:id}/vote', [VoteController::class, 'destroy'])->name('comment.unvote');




