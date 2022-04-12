<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'first post', 'posted_by' => 'Gbr', 'created_at' => '2022-04-12'],
            ['id' => 2, 'title' => 'second post', 'posted_by' => 'Ahmed', 'created_at' => '2022-04-12'],
            ['id' => 3, 'title' => 'third post', 'posted_by' => 'Mohammed', 'created_at' => '2022-04-12'],
        ];
        return view('posts.index',[
            'allPosts' => $posts, // this is the key passing it to view (index.blade.php)
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return 'we are in store';
    }

    public function show($post)
    {
        return view('posts.show');
    }
}