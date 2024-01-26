<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Info;
use App\Models\Research;
use Inertia\Inertia;

// Posts
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
Route::resource('posts', 'App\Http\Controllers\PostsController@index');

// Notes Graphql
// USE Lighthouse and Vue Apollo

// Info(s)
Route::get('/info', 'App\Http\Controllers\InfoController@index');
Route::get('/info', 'App\Http\Controllers\InfoController@create');
Route::post('/info', 'App\Http\Controllers\InfoController@store');
Route::get('/info', function () {
    return view('info', [
        'info' => Info::all()
    ]);
});
Route::patch('/info/{id}', 'App\Http\Controllers\InfoController@update');
Route::delete('/info/{id}', 'App\Http\Controllers\InfoController@delete');

// Research(s)
Route::get('/research', 'App\Http\Controllers\ResearchController@index');
Route::get('/research', 'App\Http\Controllers\ResearchController@create');
Route::post('/research', 'App\Http\Controllers\ResearchController@store');
Route::get('/research', function () {
    return view('research', [
        'research' => Research::all()
    ]);
});
Route::patch('/research/{id}', 'App\Http\Controllers\ResearchController@update');
Route::delete('/research/{id}', 'App\Http\Controllers\ResearchController@delete');