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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function(){
    Route::post('/tweet','TweetController@store');
    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::get('/profile/{user:user_name}','ProfileController@show')->name('profile');
    Route::PUT('/profile/{user:user_name}','ProfileController@Update');

    Route::POST('/profile/{user:user_name}/follow','FollowsController@store')->name('follows');
    Route::GET('/profile/{user:user_name}/edit','ProfileController@edit');
    Route::GET('/explore','ExploreController@index');
    Route::POST('/tweets/{tweet}','TweetController@like');
    Route::Delete('/tweets/{tweet}','TweetController@dislike');

});
