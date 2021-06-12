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

//ログイン画面を表示
Route::get('/', 'LoginController@showList')->name('Logins');
Auth::routes();

//商品登録画面を表示
Route::get('/home/create', 'HomeController@showCreate')->name('create');

//商品登録
Route::post('/home/store', 'HomeController@exeStore')->name('store');

//商品一覧画面を表示
Route::get('/home', 'HomeController@index')->name('home');

//商品検索結果を表示
Route::get('/home/find', 'HomeController@find')->name('find');

//商品詳細画面を表示
Route::get('/home/{id}', 'HomeController@showDetail')->name('show');

//商品編集画面を表示
Route::get('/home/edit/{id}', 'HomeController@showEdit')->name('edit');

//商品編集
Route::post('/home/update', 'HomeController@exeUpdate')->name('update');

//商品削除
Route::post('/home/delete/{id}', 'HomeController@exeDelete')->name('delete');







