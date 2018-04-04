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
//Front view
Route::get('/', function () {
    return view('crud');
});
//create all resource controller function routes
Route::resource('crud', 'CrudController');	