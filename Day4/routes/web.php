<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //== require
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
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
    if (Auth::check()) {
        return view('home');
    } else {
        return view('auth.login');
    }
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
// Route::resource('/posts', 'PostController')->middleware('auth');


// Comments Routes
Route::post('/comments/{postId}', [CommentController::class, 'create'])->name('comments.create')->middleware('auth');
Route::delete('/comments/{postId}/{commentId}', [CommentController::class, 'delete'])->name('comments.delete')->middleware('auth');
Route::get('/comments/{postId}/{commentId}', [CommentController::class, 'view'])->name('comments.view')->middleware('auth');
Route::patch('/comments/{postId}/{commentId}', [CommentController::class, 'edit'])->name('comments.update')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    // dd($githubUser);
    $user = User::where('github_id', $githubUser->id)->first();
    if (!$user) {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar,
        ]);
    }
    Auth::login($user);
    return redirect('/');
});

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
Route::get('/auth/callback/{provider}', [SocialController::class, 'callback']);

    // $user->token