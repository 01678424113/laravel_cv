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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'theloai'],function (){
        Route::get('danhsach','TheLoaiController@getDanhsach');

        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');
    });
});
