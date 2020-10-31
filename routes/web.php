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
Route::get('/','MakeEventController@index')->name('main');
//新規作成画面表示
Route::get('/create','MakeEventController@create')->name('create');
//イベント投稿機能
Route::post('/store','MakeEventController@store')->name('store');
//イベント削除画面
Route::post('/delete/{id}','MakeEventController@delete')->name('delete');
//出欠確認画面表示
Route::get('/attend/{id}','MakeEventController@attend')->name('attendance');
//出欠登録機能
Route::post('/form','MakeEventController@form')->name('form');
//出欠取り消し機能
Route::post('/cancel/{id}','MakeEventController@cancel')->name('cancel');

//ログイン機能
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
