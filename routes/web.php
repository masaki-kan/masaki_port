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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/', 'LangController@index');
//home
//Route::get('/home/{lang_id}', 'PhotoIndexCotroller@index')->name('home');

//Route::get('/new/{post_id}', 'PhotoIndexCotroller@new')->name('new');

//Route::post('/store', 'PhotoIndexCotroller@store')->name('imagestore');

//user
Route::get('/user/{user_id}', 'UserIndexController@index')->name('user');

Route::get('/user_create/{user_id}', 'UserIndexController@create')->name('usercreate');

Route::post('/user_edit', 'UserIndexController@edit')->name('useredit');
//削除
//Route::get('/delete/{id}', 'PhotoIndexCotroller@destroy');

//googleログイン
Route::get('/auth/{service}', 'OAuthLoginController@getGoogleAuth')->where('service', 'google');
Route::get('/auth/callback/google', 'OAuthLoginController@authGoogleCallback');

//map
Route::get('/', 'MapController@index');

Route::get('/result/{id}', 'MapController@show')->name('gmap');

Route::get('/mapadd','MapController@store')->name('mapadd');

Route::post('/add', 'MapController@add')->name('add');

Route::get('/search', 'MapController@search')->name('search');

Route::get('/input', 'MapController@input')->name('input');

Route::get('/googlesearch', 'MapController@googlesearch')->name('googlesearch');

Route::get('/map_delete/{id}', 'MapController@destroy')->name('map_delete');

Route::post('/gallery', 'GalleryController@gallery')->name('gallery');

Route::get('/mapcreate/{id}', 'MapController@mapcreate')->name('mapcreate');

Route::post('/mapcreate', 'MapController@create')->name('create');



//Route::get('/home', 'HomeController@index')->name('home');
