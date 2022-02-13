<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Route;
use Admin\Controllers\Auth\LoginController;
use Admin\Controllers\TopController;

// Auth
Route::get('/login', [LoginController::class, 'loginForm'])->name('auth.login');
Route::post('/login', 'Auth\LoginController@login')->name('auth.login.post');
Route::post('/logout', 'Auth\LoginController@logout')->name('auth.logout');

// Top Page
Route::get('/top', [TopController::class, 'index'])->name('top.index');

//Post Category
Route::get('post_category', 'PostCategoryController@index')->name('post_category.index'); //6_1
Route::get('post_category/create', 'PostCategoryController@create')->name('post_category.create');
Route::post('post_category/store', 'PostCategoryController@store')->name('post_category.store'); //6_3
Route::get('post_category/{postCategory}/edit', 'PostCategoryController@edit')->name('post_category.edit');
Route::post('post_category/{postCategory}/update', 'PostCategoryController@update')->where(['postCategory' => '[0-9]+'])->name('post_category.update'); //6_4
Route::post('post_category/{postCategory}/destroy', 'PostCategoryController@destroy')->where(['postCategory' => '[0-9]+'])->name('post_category.destroy'); //6_5

//Post
Route::get('post', 'PostController@index')->name('post.index'); //6_6
Route::get('post/create', 'PostController@create')->name('post.create'); //6_7
Route::post('post/store', 'PostController@store')->name('post.store'); //6_8
Route::get('post/{post}/edit', 'PostController@edit')->where(['post' => '[0-9]+'])->name('post.edit'); //6_9
Route::post('post/{post}/update', 'PostController@update')->where(['post' => '[0-9]+'])->name('post.update'); //6_10
Route::post('post/{post}/destroy', 'PostController@destroy')->where(['post' => '[0-9]+'])->name('post.destroy'); //6_11
Route::post('post/upload', 'PostController@upload')->name('post.upload'); //6_11
Route::post('post/content_upload', 'PostController@content_upload')->name('post.content.upload'); //6_11

//Setting
Route::get('setting/top', 'SettingController@top')->name('setting.top');
Route::post('setting/top/featured', 'SettingController@storeFeatured')->name('setting.top.featured.store');