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


// 首页
// Route::get('index','Home\IndexController@index')->name('index');
Route::get('/',function(){return view('home.index');})->name('index');
Route::get('/art-{id}',function(){return view('home.index');});
Route::get('Api/{action}',function(App\Http\Controllers\Home\ApiController $index ,$action){
         return $index->$action();
     });

// 404
Route::get('404',function(){return view('layouts.404');})->name('404');

//登陆界面
Route::any('admin/login','Admin\LoginController@login');
Route::get('admin/loginOut','Admin\LoginController@loginOut')->name('loginOut');

Route::group(['middleware'=>'AdminAuth','prefix' => 'admin','namespace' => 'Admin'],function(){

    Route::get('index','IndexController@index');
    Route::any('upload','UploadController@upload');
    Route::get('list/{id}/{status}','ArticleController@list');
    Route::any('{action}',function(App\Http\Controllers\Admin\ArticleController $index ,$action){
         return $index->$action();
    });

    //栏目
    Route::get('type/list/{id}/{status}','TypeController@list');
    Route::any('type/{action}',function(App\Http\Controllers\Admin\TypeController $index ,$action){
         return $index->$action();
    });

    //用户信息
    Route::get('user/list/{id}/{status}','UserController@list');
    Route::any('user/{action}',function(App\Http\Controllers\Admin\UserController $index ,$action){
         return $index->$action();
    });

    //网站设置
    Route::get('config/index','ConfigController@index')->name('config');
    Route::post('config/save','ConfigController@save');

});



