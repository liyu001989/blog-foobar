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


Route::group(['middleware' => 'auth'], function() {
    Route::get('user', 'UserController@userShow')->name('user.info');
    Route::post('user/avatar', 'UserController@updateAvatar')->name('user.avatar');
    Route::get('notifications', 'Notification@index')->name('notifications.index');
});


Route::resource('posts', 'PostController');
Route::resource('posts.comments', 'CommentController', ['only' => [
    'store', 'update', 'destroy', 'edit'
]]);


Auth::routes();

Route::get('/home', 'HomeController@index');
