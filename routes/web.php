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

//Route pour accueil
Route::get('/', 'PagesController@accueil');
//Route pour login et register
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes pour onglets du site
Route::get('boiteaidees', 'PagesController@boiteaidees');
Route::get('accueil', 'PagesController@accueil');
Route::get('event', 'PagesController@event');
Route::get('ecom', 'PagesController@ecom');


