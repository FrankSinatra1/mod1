<?php

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


Route::post('api/posts', 'PostsController@store');

Route::post('api/posts/{id}', 'PostsController@update');

Route::get('api/posts/{id}', 'PostsController@update');

Route::get('api/posts/{id}', 'PostsController@show');

Route::get('api/posts/{id}/comments/{comment_id}', 'PostsController@show');

Route::post('/auth', [
	'uses' => 'AuthController@index'
])->name('auth.create');

Route::post('/post', [
	'uses' => 'PostsController@store'
])->name('post.create');