<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'pts\PostsController@index');
Route::get('/home', 'HomeController@index');
Route::get('/public', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
    
]);
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::get('posts', ['as' => 'admin.posts.index', 'uses' => 'pts\PostsAdminController@index']);
    Route::group(['prefix' => 'post'], function() {
        Route::get('create', ['as' => 'admin.post.create', 'uses' => 'pts\PostsAdminController@create']);
        Route::post('store', ['as' => 'admin.post.store', 'uses' => 'pts\PostsAdminController@store']);
        Route::get('edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'pts\PostsAdminController@edit']);
        Route::put('update/{id}', ['as' => 'admin.post.update', 'uses' => 'pts\PostsAdminController@update']);
        Route::get('delete/{id}', ['as' => 'admin.post.destroy', 'uses' => 'pts\PostsAdminController@destroy']);
    });
});
