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
    return redirect('/blog');
});

Route::get('/blog', 'BlogController@index')->name('blog.home');
Route::get('/blog/{slug}', 'BlogController@showPost')->name('blog.detail');

Auth::routes();

//后台路由
Route::get('/admin', function (){
   return redirect('/admin/post');
});

Route::middleware('auth')->namespace('Admin')->group(function (){
   Route::resource('/admin/post', 'PostController');
   Route::resource('/admin/tag', 'TagController');
   Route::get('admin/upload', 'UploadController@index');
});

//登录推出
Route::get('/login', 'Auth\LoginController')
