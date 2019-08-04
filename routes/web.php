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
Route::get('/','HomePageController@userLogin');
Route::get('/user-login','HomePageController@userLogin');
Route::get('/dashboard','HomePageController@dashboard');

Route::post('/search','HomePageController@search');
//Route::post('/test','HomePageController@test');

Route::get('/follower-and-following-list','HomePageController@followerAndFollowingList');
Route::post('/follower-and-following-list-details','HomePageController@followerAndFollowingListDetails');
Route::post('/default-search','HomePageController@defaultSearch');

Route::get('/home', 'HomePageController@index')->name('home');

Route::get('/login','HomePageController@loginPage');
Route::post('/loginSubmit','HomePageController@loginSubmit');
Route::post('/sms-page','HomePageController@smsPage');
Route::post('/url-download','HomePageController@urlDownload');
Route::post('/app-url-download','HomePageController@appUrlDownload');

Route::get('/logout','HomePageController@logout');
Route::get('/test','HomePageController@test');

Route::post('/picture-search','HomePageController@pictureSearch');
Route::post('/picture-download','HomePageController@pictureDownload');

Route::get('/media-url','HomePageController@media');
Route::get('/media-url-download','HomePageController@mediaUrlDownload');
Route::post('/media-url-display','HomePageController@mediaUrlDisplay');

Route::get('/csv-image-download', 'HomePageController@csvImageDownload');
Route::post('/hashtag-search', 'HomePageController@hashtagSearch');
Route::post('/hashtag-list-details', 'HomePageController@hashtagListSearchDetails');
Route::get('/media-app','HomePageController@mediaApp');
Route::post('/media-app-image','HomePageController@mediaAppImage');
Route::post('/location-search', 'HomePageController@locationSearch');
Route::post('/location-list-details', 'HomePageController@locationListSearchDetails');
