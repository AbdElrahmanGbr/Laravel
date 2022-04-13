@extends('layouts.app')
@section('title') Create Post @endsection
@section('content')
<h1 class="text-center">New Post</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                         @if (session('status')) <!-- if session has a key status -->
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }} <!-- display the value of session key status -->
                            </div>
                        @endif
                        <form method="POST" action="{{route('posts.store')}}">
                            @csrf <!-- This is a security feature to prevent Cross-Site Request Forgery -->
                            <div class="form-group">
                                <label for="">Post Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Post Body</label>
                                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Published by</label>
                                <select name="published_by" id="" class="form-control">
                                    <option value="">Select Author</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                            </div>
                            <div class="form-group">
                                <label for="">Published At</label>
                                <input type="date" name="published_at" class="form-control">
                            </div>
                            
                            <button type="submit" class="btn btn-primary m-2">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            @endsection
      