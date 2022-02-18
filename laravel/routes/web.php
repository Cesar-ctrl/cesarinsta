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
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/files/{path}', 'StorageController@get')->middleware('auth')
       ->name('fileGet')->where('path', '.*');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/home', 'UserController@home')->name('user');
Route::get('/user/{id}', 'UserController@show')->name('show');
Route::get('/user/config', 'UserController@config')->name('config');
Route::post('/user/config', 'UserController@update')->name('config.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->where('filename', '[A-z0-9\s\.]+')->name('user.avatar');
Route::get('/users', 'UserController@config')->name('search');


Route::get('/', 'ImageController@index')->name('images');
Route::get('/images', 'ImageController@index')->name('images');
Route::get('/image/save', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@store')->name('image.save');
Route::get('/image/image_path/{image_path}', 'ImageController@getImage')->where('filename', '[A-z0-9_\s\.]+')->name('image.image_path');
Route::get('/image/{id}', 'ImageController@show')->name('image.detail');

Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
Route::post('/image/{id}/like', 'ImageController@like')->name('image.like');
Route::get('/image/{id}/comment', 'CommentController@getComments')->name('comment.detail');


Route::get('/image/{id}/comentarios', 'ImageController@comments')->name('image.comment');
Route::get('/image/{id}/write', 'CommentController@create')->name('comment.write');
Route::post('/image/{id}/write', 'CommentController@store')->name('comment.store');

Route::get('/dolike/{id}', 'LikesController@dolike')->name('dolike');
Route::get('/liked', 'ImageController@liked')->name('likes');


