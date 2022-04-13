<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
   private $posts = [
       ['id' => 1, 'title' => 'first post', 'posted_by' => 'ahmed', 'created_at' => '2022-04-12'],
       ['id' => 2, 'title' => 'second post', 'posted_by' => 'mohamed', 'created_at' => '2022-04-12'],
         ['id' => 3, 'title' => 'third post', 'posted_by' => 'ali', 'created_at' => '2022-04-12'],
   ];
    public function index()
    {

       return view('posts.index',['allPosts'=>$this->posts]);


    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $postData=request()->all();

        $post=[
            "id"=>count($this->posts )+1,
            "title" => request()["title"],
            "posted_by" => request()['postedby'],
            "created_at" => request()['createdat']
        ];


       array_push($this->posts,$post);


         return view('posts.index',['allPosts' => $this->posts]);



    }

    public function show($post)
    {

        $post = $this->posts[$post-1];

        return view('posts.show',['post'=>$post]);

    }

    public function edit($id){


        $post=$this->posts[$id];

        return view('posts.edit',['post'=>$post]);
    }

    public function update($id,Request $request){

        $post=$request->all();

        $this->posts[$id]=$post;

        return view('posts.index',['allPosts' => $this->posts]);

    }


    public function destroy ($id){

        unset($this->posts[$id]);

       return view('posts.index',['allPosts' => $this->posts]);

       }
}