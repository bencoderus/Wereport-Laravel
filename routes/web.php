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
//Pages
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/notifications', 'PagesController@notification');
Auth::routes();

Route::get('/dashboard', 'DbController@index')->name('dashboard');
Route::resource('message', 'MessageController');
Route::get('send', 'MessageController@send');
//Admin routes

Route::get('/admin/replies', 'AdminController@replies');
Route::get('/admin/random', 'AdminController@random');
Route::get('/admin/unread', 'AdminController@unread');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/messages', 'AdminController@messages');
Route::get('/admin/users', 'AdminController@users');
//Comments
Route::post('/comment/add', 'CommentController@store');
Route::post('/comment/delete', 'CommentController@delete');
Route::post('/comment/update', 'CommentController@update');
Route::get('/comment/edit/{id}', 'CommentController@edit');
//Users Account
Route::post('/user/storeimage', 'UserController@storephoto');
Route::get('/user/changephoto', 'UserController@addphoto');
Route::get('/user/{id}', 'UserController@profile');
