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
        $posts = Post::paginate(5);
        $comments = \App\Models\Comment::with('commentable')->get();
      return view('posts.index',['allPosts'=>$posts, 'comments'=>$comments ]);

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
        $post = Post::findOrFail($post);
        $user = User::all();
        return view('posts.edit',[
            'post' => $post,
            'users' => $user,
        ]);
    }

        // to show a single post
        public function show($post)
        {
            $post = Post::find($post);
            // dd($post);
            return view('posts.show', [
                'posts' => $post,
            ]);
        }
        
    // {
        //select * from posts where id = 1
        //second approach to find the post
        // $dbPost = Post::where('id',$post)->first();
        // Post::where('title','first post')->first();
        // dd($dbPost);
        // return view('posts.show',[
        //     'post' => $dbPost,
        // ]);

    // }
    public function update(Request $request, $post)
    {
        $post = Post::findOrFail($post);
        $post->update(['title' => $request->title, 'body' => $request->body, 'user_id' => $request->published_by]);
        // $post->update(request()->all());
        return to_route('posts.index');
        //redirect to /posts
    }
    public function destroy($post)
    {
        $post = Post::find($post);
        $post -> Comments() -> delete();
        $post -> delete();
        return to_route('posts.index');
    }


}