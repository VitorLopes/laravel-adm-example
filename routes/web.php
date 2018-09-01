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

    /**Admin**/
    Route::get('admin',['uses' => 'IndexController@index'])->name('admin.index');
    Route::get('admin/logout',['uses' => 'LoginController@logout'])->name('login.logout');

    /**Notice**/
    Route::get('admin/notice',['uses' => 'NoticeController@index'])->name('notice.index');
    Route::get('admin/notice/create',['uses' => 'NoticeController@create'])->name('notice.create');
    Route::get('admin/notice/edit/{id}',['uses' => 'NoticeController@edit'])->name('notice.edit');    
    Route::get('admin/notice/delete/{id}',['uses' => 'NoticeController@delete'])->name('notice.delete');
    Route::post('admin/notice',['uses' => 'NoticeController@save'])->name('notice.save');
    /**/////**/

    /**Credit**/
    Route::get('admin/credit',['uses' => 'CreditController@index'])->name('credit.index');
    Route::get('admin/credit/create',['uses' => 'CreditController@create'])->name('credit.create');
    Route::get('admin/credit/edit/{id}',['uses' => 'CreditController@edit'])->name('credit.edit');    
    Route::get('admin/credit/delete/{id}',['uses' => 'CreditController@delete'])->name('credit.delete');
    Route::post('admin/credit',['uses' => 'CreditController@save'])->name('credit.save');
    /**/////**/
    ///

    /**Patiente**/
    Route::get('admin/patient',['uses' => 'PatientController@index'])->name('patient.index');
    Route::get('admin/patient/create',['uses' => 'PatientController@create'])->name('patient.create');
    Route::get('admin/patient/edit/{id}',['uses' => 'PatientController@edit'])->name('patient.edit');
    Route::get('admin/patient/delete/{id}',['uses' => 'PatientController@delete'])->name('patient.delete');
    Route::post('admin/patient',['uses' => 'PatientController@save'])->name('patient.save');
    /**/////**/
});