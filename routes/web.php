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
Route::get('clone', 'Client\CloneController@clone');
Route::get('/', 'Client\SiteController@home')->name('home');
Route::get('{slug}-{id}', 'Client\SiteController@detail')->where(array('slug' => '[a-z0-9\-]+', 'id' => '[0-9]+'))->name('detail');

Route::get('{cate}', 'Client\SiteController@newsCategory')->name('category');

