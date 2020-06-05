<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', 'HomeController@index');
Route::get('/install', 'InstallController@index');
Route::post('/install/firefly/oauth/request', 'InstallController@fireflyOauthRequest')->name('fireflyOauthRequest');
Route::get('/install/firefly/oauth/response', 'InstallController@fireflyOauthResponse')->name('fireflyOauthResponse');
Route::get('/install/firefly/oauth/accesscode', 'InstallController@fireflyOauthResponse')->name('fireflyOauthAccessCodeResponse');