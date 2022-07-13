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

Route::get('/', 'HomeController@index');
Route::get('/alur', 'HomeController@flow')->name('home.flow');
Route::get('/pengumuman', 'HomeController@announcement')->name('home.announcement');
Route::get('/uang-kuliah', 'HomeController@fee')->name('home.fee');
Route::get('/daftar', 'HomeController@register')->name('home.register');
Route::get('/visi', 'HomeController@visi')->name('home.visi');
Route::get('/sejarah', 'HomeController@history')->name('home.history');
Route::get('/program-studi', 'HomeController@studi')->name('home.study');
Route::get('/login', 'HomeController@login')->name('home.login');
// Auth::routes();

// Route::view('/admin/{any}', 'admin')->where('/any', '.*');
Route::any('/admin/{any}', 'UserController@index');
Route::any('/admin/hasil/{any}', 'UserController@index');
Route::any('/admin/pesertaaktifdetail/{any}', 'UserController@index');
Route::any('/user/{any}', 'UserController@index');
Route::get('/user', 'UserController@index');
Route::get('/admin', 'UserController@index');
Route::get('/auth', 'UserController@index')->name('auth');
// Route::get('/admin', 'UserController@changeAccount');
Route::get('/logout', 'UserController@logout');

Route::post('/login', 'Auth\LoginController@login');

Route::post('/pengguna/daftar', 'Auth\RegisterController@create')->name('pengguna.register');

Route::get('/print/{any}', 'UserController@print');
// Route::get('/', 'HomeController@index')->name('home');
