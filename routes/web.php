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

Route::get('/','SearchController@index');
Route::post('/results/','SearchController@search');
Route::get('/listAll/{user}','FollowerController@listAll')->name('user.follower.listing');
Route::get('/getFollowers/{user}/{page_number}','FollowerController@getFollowers');
