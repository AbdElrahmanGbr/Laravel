<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController; // <-- this is the controller same as require
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
    return 'we are in files';
    // return view('welcome');
});

// put the dynamic urls in the end of routes uri (/posts/create) goes to any uri that starts with /posts/{any}
// giving the uri a name (posts.name) "shortcut" to define the uri
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/{post}/comments', [PostController::class, 'comment'])->name('posts.comment');
Route::post('/comments/{postId}',[CommentController::class,'create'])->name('comments.create');
Route::delete('/comments/{postId}/{commentId}',[CommentController::class,'destroy'])->name('comments.destroy');
Route::get('/comments/{postId}/{commentId}/edit',[CommentController::class,'edit'])->name('comments.edit');
Route::patch('/comments/{postId}/{commentId}',[CommentController::class,'update'])->name('comments.update');

// Route::resource('posts', PostController::class);
