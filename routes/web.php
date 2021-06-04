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
//todo inizializzare i controller
Route::get('/home', function () {
    return view('guest');
//    todo view home
});

//    todo  logController
Route::get('/login', null
    //todo view login
);

Route::post('/login', null
    //todo controlli sul login
);

Route::get('/logout', null
    //todo logout
);

Route::get('/lista_cliente', null
    //todo view customer_list
);

Route::get('/area_riservata', null
    //todo view reserved_area
);
