<?php


namespace App\Http\Controllers;


use App\models\Lista;
use App\models\Prodotto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class ListController extends Controller
{
    static function customerList_(){
        if (LoginController::isLogged())
            return view('customer_list')->with('products',self::loadProductsList_());
        return redirect(route('login'));
    }

    static function productList_(Request $request){

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

    static function saveList_(Request $request){

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

    static function loadProductsList_(){
        $list = collect();

        $listinfo = Lista::all()->where('id_cliente',session('user_id'));

        foreach ($listinfo as $item){
            $prod = Prodotto::where('codice',$item->codice_prodotto)->first();

            $list->push([
                'nome' => $prod->nome,
                'produttore' =>$prod->produttore,
                'quantita_prodotto' =>$item->quantita_prodotto,
                'codice' => $prod->codice
            ]);
        }

        return $list->all();
    }

    static function deleteList(){
        return Lista::where('id_cliente',session('user_id'))->delete();
    }
}
