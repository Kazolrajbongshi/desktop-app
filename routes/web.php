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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard','HomePageController@dashboard');

Route::post('/search','HomePageController@search');
Route::get('/test','HomePageController@test');

Route::get('/follower-and-following-list/{id}','HomePageController@followerAndFollowingList');

