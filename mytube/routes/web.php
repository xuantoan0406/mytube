<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('logins', 'AuthController@getLogin')->name('logins');
Route::post('logins', 'AuthController@postLogin');

Route::get('registers', 'AuthController@getRegister')->name('registers');
Route::post('registers', 'AuthController@postRegister');

Auth::routes();

Route::get('update', 'HomeController@index')->name('update');
Route::post('upload', 'videoController@upload');
Route::get('listVideo', 'videoController@listVideo');
Route::post('search', 'videoController@search');
Route::get('delete/{id}', 'videoController@delete');
Route::get('jav', function () {
    return view("learnJs");
});
Route::resource('video', 'VueVideoController');
Route::post('video', 'VueVideoController@store')->name('video');
