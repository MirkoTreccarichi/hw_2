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

Route::get('/','HomeController@home')->name('home');
Route::get('/home','HomeController@home')->name('home');

Route::get('/welcome','HomeController@welcome');

Route::get('api/news','ApiController@loadNews')->name('api/news');
Route::get('api/comp','ApiController@loadCompanies')->name('api/comp');

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@checkLogin');

Route::get('/registrazione', 'RegisterController@page')->name('registrazione');
Route::post('/registrazione', 'RegisterController@register')->name('registra');
Route::post('/registrazione/email_free','RegisterController@emailFree')->name('emailFree');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/lista_cliente','ReservedAreaController@customerList')->name('list');
Route::get('/lista_prodotti','ReservedAreaController@productList');
Route::get('/cerca_prodotti','ReservedAreaController@searchProduct');
Route::get('/carica_prodotti','ReservedAreaController@loadProductsAll');
Route::get('/salva_lista','ReservedAreaController@saveList');
Route::get('/elimina_lista','ReservedAreaController@deleteList');

Route::get('/favorites_customer_point','CustomerController@favoriteCustomerPoint');

Route::get('/load_customer_point','ReservedAreaController@loadCustomerPoint');

Route::get('/area_riservata', 'ReservedAreaController@reservedArea')->name('customer_area');

//todo non far visualizzare i prodotti che sono stati scelti in una lista

