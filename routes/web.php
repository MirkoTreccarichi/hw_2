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
//todo inizializzare il modello
//todo inizializzare i controller
Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
    //todo view home
});

Route::get('login', function () {
    return view('home');
    //todo view login
});

Route::post('login', function () {
    //todo controlli sul login
});

Route::get('logout', function () {
    //todo logout
});

Route::get('lista_cliente', function () {
    return view('customer_list');
    //todo view customer_list
});

Route::get('area_riservata', function () {
    return view('reserved_area');
    //todo view reserved_area
});
