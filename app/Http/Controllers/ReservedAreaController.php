<?php


namespace App\Http\Controllers;


use App\models\Lista;
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

    function loadCustomerPoint(){
       $puntiVendita = Punto_vendita::all();
        $affiliates = array();
        foreach ($puntiVendita as $aff) {
            array_push($affiliates,
                array('title' => $aff->citta,'src' =>  $aff->src_img,'address' =>  $aff->indirizzo));
        }

        return Json::encode($affiliates);
    }

    function customerList(){
        if (LoginController::isLogged())
            return view('customer_list')->with('products',$this->loadProductsList());
        return redirect(route('login'));
    }

    function productList(Request $request){

        $response = new JsonResponse();

        if (empty($request->query())){
            if (!$request->hasCookie('list')){
                return $response->withCookie('list',null);
            }

            return  $request->cookie('list');
        }

        if (!$request->has('prodotto0')){
            if ($request->hasCookie('list')){
                $response->cookie(cookie()->forever('list',null));
                $response->setData(true);
                return $response;
            }
        }

        $response->withCookie(cookie()->forever('list',
            Json::encode($request->query())));
        $response->setData(true);

        return $response;


    }

    function searchProduct(Request $request){
        return Json::encode(Prodotto::where('nome','like','%'.$request->query('query').'%')->get());
    }

    function loadProducts(){
        $prodotti = Prodotto::all();
        $products = array();
        foreach ($prodotti as $prod) {
            array_push($products,
                array('code' => $prod->codice,'producer' =>$prod->produttore,'price'=>$prod->prezzo,
                    'name'=>$prod->nome,'src' =>  $prod->src));
        }

        return Json::encode($products);
    }

    function saveList(Request $request){

        $response = new JsonResponse();

        if(!LoginController::isLogged())
            return null;

        $lista = new Lista();
        $lista->quantita_prodotto = $request->query('quantita');
        $lista->codice_prodotto = $request->query('codice_prodotto');
        $lista->id_cliente = session('user_id');

        $lista->save();

        $response->setData($lista);
        $response->withCookie('list',null);

        return $response;
    }

    function loadProductsList(){
        $list = collect();

        $listinfo = Lista::all()->where('id_cliente',session('user_id'));

        foreach ($listinfo as $item){
            $prod = Prodotto::where('codice',$item->codice_prodotto)->first();

            $list->push([
                'nome' => $prod->nome,
                'produttore' =>$prod->produttore,
                'quantita_prodotto' =>$item->quantita_prodotto
            ]);
        }

        return $list->all();
    }


}
