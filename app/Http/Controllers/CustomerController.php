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
            if (!$request->hasCookie(session('user_id').'prefcities')){
                return $response->withCookie(cookie()
                    ->forever(session('user_id').'prefcities',
                        Json::encode(null)));
            }

            return $request->cookie(session('user_id').'prefcities');
        }

        if (!$request->has('citta0')){
            if ($request->hasCookie(session('user_id').'prefcities')){
                $response->withCookie(cookie()
                    ->forever(session('user_id').'prefcities',
                        Json::encode(null)));
                return $response;
            }
        }

        $response->withCookie(cookie()
            ->forever(
                session('user_id').'prefcities',
                Json::encode($request->query()))
        );
        $response->setData($request->query());

        return $response;
    }
}
