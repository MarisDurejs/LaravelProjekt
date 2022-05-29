<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    return view('welcome');
});

Route::get('/page', function () {
    $name = 'Maris';
    return view('page', [
        'name' => $name,
    ]);
});

Route::get('/page', [PageController::class, 'index']);

Route::get('/greetings', function() {
        $name = 'Maris';
        return view('greetings' , [
            'name' => $name, 
        ]);
});

Route::get('/posts', function() {
    $posts = Post::get();
    dd($posts);
});
