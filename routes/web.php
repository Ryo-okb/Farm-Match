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

Route::get('/', function () {
    return view('top');
})->name('top');
Route::get('login','FarmController@login')->name
('login');
Route::post('list','FarmController@list')->name
('list');
Route::get('signup','FarmController@showsignup')->name
('showsignup');
Route::post('signcomp','FarmController@signup')->name
('signcomp');
Route::get('post','FarmController@showPostForm')->name
('post');
Route::post('post','FarmController@createPost')->name
('postcomp');
Route::get('detail/{id}','FarmController@detail')->name
('detail');
Route::get('reservation/{id}','FarmController@showReservationForm')->name
('reservation');
Route::post('reservecomp','FarmController@createReservation')->name
('reservecomp');
Route::get('list','FarmController@listback')->name
('listback');
Route::get('mypage', 'FarmController@mypage')->name
('mypage');
Route::get('/password/reset', 'FarmController@showResetForm')->name
('password.reset');
Route::post('/password/reset', 'FarmController@resetPassword')->name
('reset.password');
Route::get('/mypage/post/{id}/edit', 'FarmController@editPost')->name
('editPost');
Route::put('/mypage/post/{id}', 'FarmController@updatePost')->name
('updatePost');
Route::put('delete/{id}', 'FarmController@deleteLand')->name
('delete');
Route::put('admin-list{id}', 'FarmController@admindeleteLand')->name
('admindelete');
Route::get('/admin-list', 'FarmController@adminList')->name('admin-list');





