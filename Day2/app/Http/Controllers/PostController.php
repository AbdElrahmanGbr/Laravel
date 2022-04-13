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
        $posts = Post::paginate(5);
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
        // get me the request data
        // $data = $_REQUEST; // this is the same as request()->all()
        $data = request()->all(); // global helper method to get all the data from the request
        // $title = request()->title;
        // dd($data);
        // store it in the database
        Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $data['published_by'], // this is the foreign key
            // 'published_by' => $data['published_by'],
            // 'published_at' => $data['published_at'],
        ]);
        //insert into posts table values($data['title'],$data['body'],$data['published_by']);
        // redirect to /posts
        return to_route('posts.index');
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
        return view('posts.show',[
            'post' => $dbPost,
        ]);
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