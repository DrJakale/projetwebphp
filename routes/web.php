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


Route::get('/', function () {
    $cars = [];
    return view('welcome', compact('cars'));
});

Route::get('services', function(){
   return view('pages.services');
});*/

Route::get('/', 'PagesController@home');
Route::get('services', 'PagesController@servicespage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
