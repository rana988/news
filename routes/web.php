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
    return view('layouts.admin');
});

Route::resource('/category', 'CategoryController');
Route::get("/category/{id}/delete","CategoryController@destroy")->name('delete-category');
Route::resource('/news', 'NewsController');
Route::get("/news/{id}/delete","NewsController@destroy")->name('delete-news');
Route::get("/search","NewsController@search")->name('search-category');


//Route::get("/category","CategoryController@index")->name('category');
//Route::get("/create","CategoryController@create")->name('create-category');
