<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',[
            'allPosts' => $posts, // this is the key passing it to view (index.blade.php)
        ]);
    }

    public function create()
    {
        $user = User::all();
        //query to get all users
        
        return view('posts.create',[
            'users' => $user, // this is the key passing it to view (index.blade.php)
        ]);
    }

    public function store()
    {
        return redirect('/posts');
    }

    public function edit($post)
    {
        return view('posts.edit',[
            'post' => $post,
        ]);
    }

    public function show($post)
    {
        //select * from posts where id = 1
        $dbPost = Post::findOrFail($post);
        //second approach to find the post
        // $dbPost = Post::where('id',$post)->first();
        // Post::where('title','first post')->first();

        // dd($dbPost);
        return view('posts.show');
    }
    public function update()
    {
        return 'we are in update';
    }

    public function destroy()
    {
        return 'we are in destroy';
    }



}