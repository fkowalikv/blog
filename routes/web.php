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

Route::post('/posts/{post}/comments', 'PostCommentsController@store')->name('comments.store');
Route::get('comments/{comment}/edit', 'PostCommentsController@edit')->name('comments.edit');
Route::patch('/comments/{comment}', 'PostCommentsController@update')->name('comments.update');
Route::patch('/comments/{comment}/like', 'PostCommentsController@updateLike')->name('comments.updateLike');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::post('/users/search','UsersController@search')->name('users.search');

Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/user/edit.blade.php', 'UsersController@edit.blade.php')->name('user.edit.blade.php');
Route::patch('/user/change-email', 'UsersController@changeEmail')->name('user.change.email');;
Route::patch('/user/change-password', 'UsersController@changePassword')->name('user.change.password');;

Auth::routes();
