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