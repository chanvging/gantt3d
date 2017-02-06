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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/company', 'CompanyController@index');
Route::get('/company/new', 'CompanyController@add_form');
Route::post('/company/new', 'CompanyController@save');
Route::get('/company/{company}', 'CompanyController@detail');
