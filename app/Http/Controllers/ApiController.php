<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Psy\Util\Json;

class ApiController extends Controller
{
    function loadCompanies(Request $symbol)
    {
        if ($symbol) {
            $data = Http::get(env('ENDPOINT_FINNHUB'), [
                'symbol' => $symbol->input('symbol'),
                'token' => env('APIKEY_FINNHUB')
            ]);
        } else
            $data = Json::encode("errore");

        return $data;
    }

    function loadNews(): \Illuminate\Http\Client\Response
    {
        return Http::get(env('ENDPOINT_NEWSAPI'),[
            'q'=>'slow food',
            'from'=>now(),
            'language'=>'it',
            'sortBy'=>'popularity',
            'apikey'=>env('APIKEY_NEWSAPI')]
        );
    }
}
