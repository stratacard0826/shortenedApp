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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('urls', 'HomeController@shortenedLinks')->name('shortenedLinks');
Route::post('/', 'HomeController@save');
Route::get('/deleteshortened/{id}', 'HomeController@deleteShortened');
Route::get('/short/{link}', 'HomeController@gotolink');




