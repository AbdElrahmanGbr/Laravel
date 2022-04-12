<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $name = 'mohammed';
        $articles = ['Laravel', 'PHP', 'Javascript'];
        return view('test', [
            'name' => $name,
            'articles' => $articles
        ]);
    }
}
