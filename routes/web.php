<?php

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostsController');

Route::post('/posts/{post}/comments', 'PostCommentsController@store')->name('comments.store');
Route::get('comments/{comment}/edit', 'PostCommentsController@edit')->name('comments.edit');
Route::patch('/comments/{comment}', 'PostCommentsController@update')->name('comments.update');
Route::patch('/comments/{comment}/like', 'PostCommentsController@like')->name('comments.like');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::post('/users/search','UsersController@search')->name('users.search');

Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}/change-email', 'UsersController@changeEmail')->name('users.change-email');
Route::patch('/users/{user}/change-password', 'UsersController@changePassword')->name('users.change-password');

Auth::routes();
