<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------F------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\PostsController@index');

Route::get('/', 'App\Http\Controllers\PostsController@create');

Route::post('/', 'App\Http\Controllers\PostsController@store');

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::patch('/{id}', 'App\Http\Controllers\PostsController@update');

Route::delete('/{id}', 'App\Http\Controllers\PostsController@delete');


// Route::get('posts/{post}', function ($id) {
//     return view('post', [
//         'post' => Post::findOrFail($id)
//     ]);
// });
