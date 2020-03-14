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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin'], function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/data/maidicene', 'DashboardController@maidicene')->name('maidicene');
    Route::get('/data/diseases', 'DashboardController@diseases')->name('diseases');
    Route::get('/data/exams', 'DashboardController@exams')->name('exams');
});
