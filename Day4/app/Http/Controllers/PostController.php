<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    //to create a new post
    public function store(StorePostRequest $request)
    {

        //to change the default behavior of the request
        // if(request()->header('Accept') && request()->header('Accept') == 'application/pdf') {
        //     return ' some pdf';
        // }

        $data = $request->all();

        //store the request data in the db
        $post = Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $data['post_creator'],
        ]);

        return new PostResource($post);
    }
    // to show a single post
    public function show($postId)
    {
        $post = Post::find($postId);
        return new PostResource($post);
    }
    //to edit a post
    public function edit($post)
    {
        $singlePost = Post::findOrFail($post);
        $users = User::all();
        // dd($singlePost);
        return view('posts.edit', [
            'post' => $singlePost,
            'users' => $users,
        ]);
    }
    //update a post
    public function update(UpdatePostRequest $request, $post)
    {
        $singlePost = Post::findOrFail($post);
        $data = request()->all();
        $path = Storage::putFile('public', request()->file('image'));
        $url = Storage::url($path);
        $slug = SlugService::createSlug(Post::class, 'slug', $data['title']);
        $singlePost->update(
            [
                'title' => $data['title'],
                'body' => $data['body'],
                'user_id' => $data['post_creator'],
                'slug' => $slug,
                'image_path' => $url,
            ]
        );
        return to_route('posts.index');
    }

    //delete a post
    public function destroy($post)
    {
        // Comment::where('id', $commentId)->delete();

        $singlePost = Post::findOrFail($post);
        $location =  $singlePost->image_path;
        $imageName = basename($location);

        $imageURL = "E:\GitHub\Laravel\Day4\public" . '\\' . $imageName;
        // unlink($imageURL);
        $singlePost->Comments()->delete();
        $singlePost->delete();
        return to_route('posts.index');
    }
}