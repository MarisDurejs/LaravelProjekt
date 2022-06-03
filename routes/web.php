<?php
use App\Http\Controllers\PostController;
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

Route::controller(PostController::class)->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', 'index')->name('posts.index');
        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/post/create', 'store')->name('posts.store');
        Route::get('/show{post}', 'show')->name('posts.show');
        Route::get('/edit{post}', 'edit')->name('posts.edit');
        Route::get('/edit{post}', 'update')->name('posts.update');        
        Route::get('/destroy{post}', 'destroy')->name('posts.destroy');
    });
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/greetings', function () {
    $name = 'Maris';
    return view('greetings' , [
        'name' => $name, 
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
