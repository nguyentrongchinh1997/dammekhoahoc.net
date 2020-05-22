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

Route::get('admin/login', 'Admin\SiteController@loginForm')->name('admin.login');
Route::post('admin/login', 'Admin\SiteController@login')->name('admin.login.post');
Route::get('admin/logout', 'Admin\SiteController@logout')->name('admin.logout');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
	Route::get('home', 'Admin\SiteController@home')->name('admin.home');

	Route::group(['prefix' => 'category'], function(){
		Route::get('list', 'Admin\SiteController@listCategory')->name('admin.category.list');
		Route::post('add', 'Admin\SiteController@addCategory')->name('admin.category.add');
	});

	Route::group(['prefix' => 'news'], function(){
		Route::get('list', 'Admin\SiteController@listNews')->name('admin.news.list');
		Route::get('add', 'Admin\SiteController@newsPostForm')->name('admin.news.add');
		Route::post('add', 'Admin\SiteController@newsAdd')->name('admin.news.add.post');
		Route::get('edit/{id}', 'Admin\SiteController@editForm')->name('admin.news.edit');
		Route::post('edit/{id}', 'Admin\SiteController@newsEdit')->name('admin.news.edit.post');
	});
});

Route::get('tim-kiem', 'Client\SiteController@search')->name('search');
Route::get('clone', 'Client\CloneController@clone');
Route::get('/', 'Client\SiteController@home')->name('home');
Route::get('{slug}-{id}', 'Client\SiteController@detail')->where(array('slug' => '[a-z0-9\-]+', 'id' => '[0-9]+'))->name('detail');

Route::get('{cate}', 'Client\SiteController@newsCategory')->name('category');



