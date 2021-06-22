<?php


namespace App\Http\Controllers;


use App\models\Prodotto;
use App\models\Punto_vendita;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Psy\Util\Json;

class ReservedAreaController
{
    function reservedArea(){
        if (LoginController::isLogged())
            return view('reserved_area');
        return redirect(route('login'));
    }

    function loadCustomerPoint(): string
    {
       $puntiVendita = Punto_vendita::all();
        $affiliates = array();
        foreach ($puntiVendita as $aff) {
            array_push($affiliates,
                array('title' => $aff->citta,'src' =>  $aff->src_img,'address' =>  $aff->indirizzo));
        }

        return Json::encode($affiliates);
    }

    function customerList(){
        return ListController::customerList_();
    }

    function productList(Request $request){
        return ListController::productList_($request);
    }

    function searchProduct(Request $request): string
    {
        return Json::encode(Prodotto::where('nome','like','%'.$request->query('query').'%')->get());
    }

    function loadProducts(): string
    {
        $prodotti = Prodotto::all();
        $products = array();
        foreach ($prodotti as $prod) {
            array_push($products,
                array('code' => $prod->codice,'producer' =>$prod->produttore,'price'=>$prod->prezzo,
                    'name'=>$prod->nome,'src' =>  $prod->src));
        }

        return Json::encode($products);
    }

    function saveList(Request $request): ?JsonResponse
    {
        return ListController::saveList_($request);
    }

}
