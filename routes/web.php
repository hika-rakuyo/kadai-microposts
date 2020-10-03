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

// サイトトップの設定(controllerを経由してindexを表示することで、ゲストとユーザーで見せ方を変えることができる)
Route::get('/', 'MicropostsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// ->name()でルーティングに名前を付けている

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function (){
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::group(['prefix' => 'microposts/{id}'], function () {
        Route::post('favorite', 'UserFavoriteController@store')->name('micropost.favorite');
        Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('micropost.unfavorite');
    });

    // 登録されたユーザーを表示するアクション
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    // 投稿に関するアクション
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});
