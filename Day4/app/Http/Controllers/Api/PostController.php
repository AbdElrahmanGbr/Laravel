<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }
    public function show($postId)
    {
        $post = Post::find($postId);
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        $data = $request->all();
        Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $data['post_creator'],
        ]);
        return new PostResource(Post::latest()->first());
        // $post = Post::create($request->all());
        // return response()->json($post, 201);
    }
    // {
    //     // if(request()->header('Accept') && request()->header('Accept') == 'application/json'){
    //     //     return 'some pdf';
    //     // }
    //     return 'we are in store';

    // }
}
