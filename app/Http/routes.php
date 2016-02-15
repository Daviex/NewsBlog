<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('addVote','NewsController@addVote');
Route::post('addCategory','NewsController@addCategory');
Route::post('addNews','NewsController@addNews');
Route::post('search','NewsController@search');
Route::post('addComment','NewsController@addComment');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'PagesController@home');
    Route::get('home','PagesController@home');
    Route::get('addNews','PagesController@addNews');
    Route::get('addCategory','PagesController@addCategory');
    Route::get('{category}/{news?}', 'NewsController@loadCategoryOrNews');
});

