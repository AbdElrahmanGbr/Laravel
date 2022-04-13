<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function create($postId)
    {
        $post = Post::find($postId);
        return view('comments.create', [
            'post' => $post,
        ]);
    }
}