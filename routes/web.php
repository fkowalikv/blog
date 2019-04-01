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

Route::get('/users', 'UsersController@index')->name('users.index');
Route::post('/users/search','UsersController@search')->name('users.search');

Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/user/edit', 'UsersController@edit')->name('user.edit');
Route::patch('/user/change-email', 'UsersController@changeEmail')->name('user.change.email');;
Route::patch('/user/change-password', 'UsersController@changePassword')->name('user.change.password');;

Auth::routes();
