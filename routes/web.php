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

// Auth::routes();

// 記事登録・編集・削除
Route::resource('/article', 'ArticleController')->except(['index', 'show'])->middleware('auth');

// カテゴリ登録・編集・削除
Route::resource('/category', 'CategoryController')->except(['show'])->middleware('auth');

// ログイン・ログアウト
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// 記事一覧・詳細
Route::get('/', 'ArticleController@index')->name('article.index');
Route::get('/{category}', 'ArticleController@category')->name('article.category');
Route::get('/article/{article}', 'ArticleController@show')->name('article.show');