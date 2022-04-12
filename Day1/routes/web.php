<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController; // <-- this is the controller same as require
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'we are in files';
    // return view('welcome');
});

Route::get('/test',[TestController::class, 'test']);
    // $name = 'Gbr';
    // $articales = ['Laravel', 'PHP', 'Javascript'];
    // return view('test' , [
    //     'name' => $name,
    //     'articles' => $articales
    // ]);
// });

Route::get('/hello', function () {
    return 'hello';
});
