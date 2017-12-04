<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 用于定义 web 界面的路由。这里面的路由都会被分配给 web 中间件组，它提供了会话状态和 CSRF 保护等功能。
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Picture;
use App\User;

Route::get('/', function () {
    return view('start');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/find', function () {
    return view('find');
});

Route::get('/choice', function () {
    return view('choice');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');