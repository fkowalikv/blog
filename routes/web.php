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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostsController');

Route::post('/posts/{post}/comments', 'PostCommentsController@store');
Route::patch('/comments/{comment}', 'PostCommentsController@update');

Route::get('/profiles/{profile}', 'ProfileController@show');
Route::get('/profiles/{profile}/edit', 'ProfileController@edit');
Route::patch('/profiles/{profile}', 'ProfileController@update');

Auth::routes();
