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

Route::get('/','SiteController@index');
Route::get('/about','SiteController@about');
Route::get('/contact','SiteController@contact');
Route::get('/blogs','BlogsController@index');
Route::get('/blogs/{slug}','BlogsController@view');
Route::post('/contact','SiteController@postContact');


Route::resource('posts','PostsController');
Route::resource('categories','CategoriesController');
Route::resource('tags','TagsController');

Route::get('login', ['as'=>'login', 'uses'=>'Auth\AuthController@getLogin']);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', ['as'=>'logout', 'uses'=>'Auth\AuthController@getLogout']);
 Route::get('register', ['as'=>'register', 'uses'=>'Auth\AuthController@getRegister']);
Route::post('register', 'Auth\AuthController@postRegister');