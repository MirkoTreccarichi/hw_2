<?php

use App\models\Punto_vendita;
use Illuminate\Support\Facades\Http;
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
Route::get('api/news','ApiController@loadNews')->name('api/news');
Route::get('api/comp/','ApiController@loadCompanies')->name('api/comp');

//    todo  logController
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@checkLogin');

Route::get('/registrazione', 'RegisterController@page')->name('registrazione');
Route::post('/registrazione', 'RegisterController@register')->name('registra');
Route::post('/registrazione/email_free','RegisterController@emailFree')->name('emailFree');

Route::get('/logout', 'LoginController@logout');

Route::get('/lista_cliente', null
    //todo customer controller
);

Route::get('/area_riservata', null
);

Route::get('/test', function () {
       /* foreach (Punto_vendita::all() as $p) {
            echo $p;
        }
        echo env('APIKEY_NEWSAPI');
        echo env('APIKEY_FINNHUB');*/
        $data = Http::get(env('ENDPOINT_FINNHUB'), [
            'symbol' => 'JNJ',
            'token' => env('APIKEY_FINNHUB')
        ]);
        echo $data;
    }
);
