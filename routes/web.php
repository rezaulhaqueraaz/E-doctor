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

    Route::get('/prescription', 'DashboardController@prescription')->name('prescription');
    Route::post('/query/medicine/query', 'DashboardController@querymedicine')->name('prescription.medicine');




    Route::get('/data/exams', 'DashboardController@exams')->name('exams');
    Route::post('/data/add/exam', 'ExamsController@store')->name('exams.store');
    Route::get('/data/get/exam', 'ExamsController@getData')->name('exam.get');
    Route::get('/data/exam/delete/{id}', 'ExamsController@delete')->name('exam.delete');

    Route::get('/data/diseases', 'DashboardController@diseases')->name('diseases');
    Route::post('/data/add/disease', 'DiseaseController@store')->name('diseases.store');
    Route::get('/data/get/disease', 'DiseaseController@getData')->name('diseases.get');
    Route::get('/data/disease/delete/{id}', 'DiseaseController@delete')->name('diseases.delete');

    Route::get('/data/maidicene', 'DashboardController@maidicene')->name('maidicene');
    Route::post('/data/add/medicine', 'MedicineController@store')->name('medicine.store');
    Route::get('/data/get/medicine', 'MedicineController@getmedicine')->name('medicine.get');
    Route::get('/data/medicine/delete/{id}', 'MedicineController@delete')->name('medicine.delete');

    Route::get('/data/company', 'DashboardController@company')->name('company');
    Route::post('/data/add/company', 'ComapnyController@store')->name('company.store');
    Route::get('/data/get/company', 'ComapnyController@getData')->name('company.get');
    Route::get('/data/company/delete/{id}', 'ComapnyController@delete')->name('company.delete');


});
