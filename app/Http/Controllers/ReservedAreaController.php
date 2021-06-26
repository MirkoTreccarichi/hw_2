<?php


namespace App\Http\Controllers;


use App\models\Prodotto;
use App\models\Punto_vendita;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Psy\Util\Json;

class ReservedAreaController extends ListController
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
        return $this->_customerList();
    }

    function productList(Request $request){
        return $this->_productList($request);
    }

    function searchProduct(Request $request): array
    {
        $prodotti = Prodotto::where('nome','like','%'.$request->query().'%')->get();
//        return Json::encode($this->loadProductsAll_($prodotti));
        return $this->loadProducts_($prodotti);
    }

    function loadProducts_(Collection $prodotti): array
    {
        $products = array();
        foreach ($prodotti as $prod) {
            array_push($products,
                array('code' => (string)$prod->codice,'producer' =>$prod->produttore,'price'=>$prod->prezzo,
                    'name'=>$prod->nome,'src' =>  $prod->src));
        }

        return $products;
    }

    function loadProductsAll(): string
    {
        $prodotti = Prodotto::all();

        return Json::encode($this->loadProducts_($prodotti));
    }

    function saveList(Request $request): ?JsonResponse
    {
        return $this->_saveList($request);
    }

    function deleteList(){
        return $this->_deleteList();
    }

}
