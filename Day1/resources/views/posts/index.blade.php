@extends('layouts.app')
@section('title') Latest posts @endsection
@section('content')
<h1 class="text-center">DashBoard For Posts</h1>
    <div class="text-center">
        <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        <!-- <a href="/posts/create" class="mt-4 btn btn-success">Create Post</a> -->
    <div class="table-responsive">
    <table class="table mt-4 align-middle table-bordered border-primary">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ( $allPosts as $post)
          <tr>
            <td>{{$post['id']}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post['posted_by']}}</td>
            <td>{{$post['created_at']}}</td>
            <td>
                <a href="{{route('posts.show', ['post' => $post['id']])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit', ['post' => $post['id']])}}" class="btn btn-primary">Edit</a>
                <form action="{{route('posts.destroy', ['post' => $post['id']])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm ('Are you sure, you want to DELETE?')" class="d-inline btn btn-danger">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
      </div>
     @endsection