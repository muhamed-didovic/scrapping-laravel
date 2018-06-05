<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/scrape', 'ScrapeController@index');

Route::get('/reports', 'ReportsController@index');
Route::post('/reports', 'ReportsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', function (){
    return view('water');
});
