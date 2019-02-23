<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


\Laravel\Passport\Passport::$ignoreCsrfToken = true;


//webhook
Route::post('/hook','Controller@hook');


//注册
Route::post('register', 'Auth\RegisterController@register2');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'api'], function(){
   Route::post('/login', 'UserController@login');
});
Route::group(['middleware' => 'auth:api', 'namespace' => 'api'], function (){
   Route::get('V1/test/passport', 'UserController@passport');
});


Route::post('/barrage/add', 'Danmu\DanmuController@add');
Route::get('/barrage/list', 'Danmu\DanmuController@getAll');



//diary
Route::namespace('Diary')->group(function (){
    Route::get('/diary', 'DiaryController@diaries');
    Route::get('/diary/detail', 'DiaryController@detail');
    Route::post('/diary/create', 'DiaryController@create');
    Route::get('/diary/category', 'DiaryController@categories');
    Route::post('/diary/create/category', 'DiaryController@createCategory');
    Route::get('/diary/tags', 'DiaryController@tags');
    Route::post('/diary/create/tag', 'DiaryController@createTag');
    Route::get('/diary/comments', 'DiaryController@comments');
    Route::post('/diary/create/comment' ,'DiaryController@createComment');
});



