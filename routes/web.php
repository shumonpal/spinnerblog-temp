<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendShipController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/posts');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class);
    Route::post('posts/{post}/vote', [VoteController::class, 'postVote'])->name('posts.vote');
    Route::post('comments/{comment}/vote', [VoteController::class, 'commentVote'])->name('comments.vote');
    Route::resource('friendships', FriendShipController::class);
});

Auth::routes(['verify' => true]);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
