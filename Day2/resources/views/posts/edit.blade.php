@extends('layouts.app')
@section('title') Edit post @endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('posts.update',['post'=>$post->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">{{$post->title}}</label>
                            <input type="text" name="title" class="form-control" value="{{$post['title']}}">
                        </div>

                        <div class="form-group">
                            <label for="">{{$post->body}}</label>
                            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">{{$post->published_by}}</label>
                            <select name="published_by" id="" class="form-control">
                                <!-- <option value="">Select Author</option> -->
                                @foreach($users as $user)
                                <option value="{{$user->id}}" {{$post->published_by == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                @endforeach
                            </div>
                            <!-- <label for="">Published At</label>
                            <input type="date" name="published_at" class="form-control"> -->
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary m-2" value="Submit">
                                <!-- <button type="submit" class="btn btn-primary m-2">Submit</button> -->
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection