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

/****************************************************************************************/
/**************************************Admin Routes**************************************/
/****************************************************************************************/
Route::group(['namespace' => 'Admin', 'middleware' => 'guest'], function(){
    Route::get('admin/login',['uses' => 'LoginController@index'])->name('login.index');
    Route::post('admin/login',['uses' => 'LoginController@authenticate'])->name('login.authenticate');
});
Route::group(['middleware' => 'auth.verify','namespace' => 'Admin'], function () {
    Route::get('/admin',['uses' => 'IndexController@index'])->name('admin.index');
});