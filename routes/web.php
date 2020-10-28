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

//ホーム画面表示
Route::get('/','MakeEventController@index')->name('home');
//詳細画面表示
Route::get('/create','MakeEventController@create')->name('create');
//イベント投稿機能
Route::post('/store','MakeEventController@store')->name('store');
//イベント削除画面
Route::post('/delete/{id}','MakeEventController@delete')->name('delete');
//出欠確認画面表示
Route::get('/attend/{id}','MakeEventController@attend')->name('attend');