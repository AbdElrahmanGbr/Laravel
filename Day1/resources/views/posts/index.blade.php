<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
</head>
<body>
    <h1 class="text-center">DashBoard For Posts</h1>
    <div class="text-center">
        <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        <!-- <a href="/posts/create" class="mt-4 btn btn-success">Create Post</a> -->
<div class="container">
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
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
      </div>
      </div>


</body>
</html>