<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function create($postId)
    {
        $post = Post::findOrFail($postId);
        $req = request();
        $post->Comment()->create([
            'user_id' => $req->user_id,
            'body' => $req->body,
            'commentable_id' => $postId,
            'commentable_type' => 'App\Models\Post',
        ]);
        return redirect()->route('posts.show', $postId);
    }
    public function view($postId, $commentId)
    {
        $post = Post::findOrFail($postId);
        $comment = Comment::where('id', $commentId)->first();
        return view('comments.edit', [
            'post' => $post,
            'comment' => $comment,
        ]);
    }
    public function edit($postId, $commentId)
    {
        $req = request();
        Comment::where('id', $commentId)->update([
            'body' => $req->body,
        ]);
        return redirect()->route('posts.show', $postId);
    }
    public function delete($postId, $commentId)
    {
        Comment::where('id', $commentId)->delete();
        return redirect()->route('posts.show', $postId);
    }
}
