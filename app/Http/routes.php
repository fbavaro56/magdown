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

Route::get('/','WebController@index');
Route::get('/show-language/{language_name}','WebController@showLang');
Route::get('/show-category/{category_name}','WebController@showCat');
Route::get('/show-magazine/{magazine_id}','WebController@showMagazine');
Route::get('/search-results','WebController@searchResults');



Route::auth();
Route::get('/my-magazines', 'HomeController@index');
Route::get('/delete-magazine/{magazine_id}', 'HomeController@deleteMagazine');
Route::post('/upload-magazine', 'HomeController@uploadMagazine');
