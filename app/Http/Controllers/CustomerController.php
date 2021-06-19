<?php


namespace App\Http\Controllers;



use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class CustomerController extends Controller
{
    function favoriteCustomerPoint(Request $request){
        $response = new JsonResponse();
        if (empty($request->query())){
            if (!$request->hasCookie('prefcities')){
                return $response->withCookie('prefcities',null);
            }

            return $request->cookie('prefcities');
        }

        if (!$request->has('citta0')){
            if ($request->hasCookie('prefcities')){
                $response->cookie(cookie()->forever('prefcities',null));
                return $response;
            }
        }

        $response->withCookie(cookie()->forever('prefcities',
            Json::encode($request->query())));
        $response->setData($request->query());

        return $response;
    }
}
