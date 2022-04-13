@extends('layouts.app')
@section('title') Post Card @endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Post title: {{$post->title}}</h2>

                    <p>Published At: {{date('Y-m-d', strtotime($post->created_at))}}</p>
                    <br>
                    <div>
                       Posted by: {{$post->user ? $post->user->name : 'Not Found'}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@foreach ($post->comments as $comment)
<div class='flex flex-col mt-6 border p-4 rounded-lg border-slate-600'>
        <h2 class='text-lg'>{{$comment->user->name}}</h2>
        <p class='text-md'>{{$comment->body}}</p>
        <span class='text-sm text-gray-500'>last updated {{$comment->updated_at}}</span>
        <div class="flex items-center mt-5">
            <form method='POST'
                action={{route('comments.delete', ['postId' => $post['id'], 'commentId' => $comment->id])}}>
                @csrf
                @method('DELETE')
                <button type="submit" class='btn btn-xs btn-primary'>Delete</button>
            </form>
            <a class='btn btn-xs btn-success ml-4'
                href={{route('comments.view', ['postId' => $post['id'], 'commentId' => $comment->id])}}>
                Edit
            </a>
        </div>
    </div>
    @endforeach
    <div class='flex flex-col mt-6  p-4 rounded-lg'>
        <form method="POST" class='flex items-center'
            action={{route('comments.update', ['postId' => $post['id'], 'commentId' => $comment->id])}}>
            @csrf
            @method('PATCH')
            <label for="comment" class="label mr-4">Edit comment</label>
            <input class="input flex-1 input-xlg" placeholder="edit comment" type="text" name="comment" id="comment"
                value={{$comment["body"]}} />
            <button type="submit" class='btn btn-info ml-4'>Edit comment</button>
        </form>
    </div>
