<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
</head>
<body>
    <h1 class="text-center">New Post</h1>
    <div class="container">
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
                                <input type="text" name="published_by" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Created At</label>
                                <input type="date" name="published_at" class="form-control">
                            </div>
                            
                            <button type="submit" class="btn btn-primary m-2">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
</body>
</html>