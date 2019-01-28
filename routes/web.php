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

Auth::routes();//Route pour login et register

//Route::get('login', 'PagesController@login');

Route::get('/home', 'HomeController@index')->name('home');

//Routes pour onglets du site
Route::get('boiteaidees', 'PagesController@boiteaidees');
Route::post('boiteaidees', 'PagesController@voteevent');
Route::get('accueil', 'PagesController@accueil');
Route::get('event', 'PagesController@event');
Route::get('createevent', 'PagesController@createevent');
Route::get('ecom', 'PagesController@ecom');
Route::get('panier', 'PagesController@panier');
Route::get('cat/{idcat}', 'PagesController@catecom');
Route::get('event/{idevent}', 'PagesController@visuevent');
Route::post('event/{idevent}/report', 'PagesController@switchreportevent');
Route::get('profil', 'PagesController@profil');
Route::get('privacy', 'PagesController@privacy');
Route::get('mescommandes', 'PagesController@mescommandes');
Route::get('photo/{idphoto}', 'PagesController@photo');
Route::post('photo/{idphoto}/publishcommentary', 'PagesController@storecomment');
Route::post('photo/{idphoto}/deletecommentary', 'PagesController@deletecomment');
Route::get('ventes', 'PagesController@ventes');
