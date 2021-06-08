<?php

use App\models\Punto_vendita;
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
//    todo home controller
});

//    todo  logController
Route::get('/login', null
    //todo login controller
);

Route::post('/login', null
);

Route::get('/logout', null
);

Route::get('/lista_cliente', null
    //todo customer controller
);

Route::get('/area_riservata', null
);

Route::get('/test', function () {
        foreach (Punto_vendita::all() as $p) {
            echo $p;
        }
    }
);
