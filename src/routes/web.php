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
Route::get('/user', "UserController@index");

// 掲示板
Route::get('/bbs', 'BbsController@index');
Route::post('/bbs', 'BbsController@create');

// github_repository
Route::get('github', 'Github\GithubController@top');
Route::post('github/issue', 'Github\GithubController@createIssue');

// github_login
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('user', 'User\UserController@updateUser');

Route::get('/test', "TestController@index");

// Photo
// Route::get('/home', 'HomeController@index');
// Route::post('/upload', 'HomeController@upload');

// instagram
Auth::routes(['register' => false]);
Route::get('instagram/home', 'Instagram\HomeController@index');
Route::get('instagram/home/"{id}"', 'Instagram\HomeController@changePage');
Route::get('instagram/post-screen', 'Instagram\PostPhotoController@index');
Route::post('instagram/post-screen/post', 'Instagram\PostPhotoController@createPost');
Route::get('instagram/profile/{}', 'Instagram\ProfileController@show');
Route::get('instagram/liked-user', 'Instagram\LikedUserController@show');


// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
