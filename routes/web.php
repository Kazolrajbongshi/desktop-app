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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user-login','HomePageController@userLogin');
Route::get('/dashboard','HomePageController@dashboard');

Route::post('/search','HomePageController@search');
Route::get('/test','HomePageController@test');

Route::get('/follower-and-following-list','HomePageController@followerAndFollowingList');
Route::post('/follower-and-following-list-details','HomePageController@followerAndFollowingListDetails');
Route::post('/default-search','HomePageController@defaultSearch');

Route::get('/home', 'HomePageController@index')->name('home');

Route::get('/login','HomePageController@loginPage');
Route::get('/loginSubmit','HomePageController@loginSubmit');
Route::post('/sms-page','HomePageController@smsPage');

Route::get('/logout','HomePageController@logout');

Route::post('/picture-search','HomePageController@pictureSearch');
Route::post('/picture-download','HomePageController@pictureDownload');


