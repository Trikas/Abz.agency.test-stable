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

Route::get('/', 'IndexPage@show');
Route::get('admin','AdminPanel@show')->name('admin')->middleware('auth');
Route::get('all_pers', 'TablePersonal@show')->name('all_personal');
Route::get('/all_pers/{how_sort}/{whom_sort}', 'SortData@sort');
Route::get('/search', 'SearchData@search');
Route::get('/validate/{id}', 'Validate@valid');
Route::get('/add-photo', 'AddPhoto@add');
Route::post('/crud-del/{id}', 'UserCRUD@delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
