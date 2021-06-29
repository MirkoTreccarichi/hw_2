<?php


namespace App\Http\Controllers;

use App\models\Cliente;
use http\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Psy\Util\Json;

class ListController extends Controller
{
    protected function _customerList(){
        if (LoginController::isLogged())
            return view('customer_list')->with('products',self::_loadProductsList());
        return redirect(route('login'));
    }

    protected function _productList(Request $request){

        $response = new JsonResponse();

        if (empty($request->query())){
            if (!$request->hasCookie('list')){
                return $response->withCookie('list',null);
            }

            return  $response->setData($request->cookie('list'));
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

    protected function _saveList(Request $request): ?JsonResponse
    {

        $response = new JsonResponse();

        if(!LoginController::isLogged())
            return null;

        Cliente::find(session('user_id'))->prodotto()
            ->detach($request['codice_prodotto']);
        Cliente::find(session('user_id'))->prodotto()
            ->attach($request['codice_prodotto'], ['quantita_prodotto' => $request['quantita']]);

        $lista = self::_loadProductsList();

        $response->setData($lista);
        $response->withCookie('list',null);

        return $response;
    }

    protected function _loadProductsList(): array
    {
        $list = new Collection;

        foreach (Cliente::find(session('user_id'))->prodotto as $item){
            $list->push([
                'nome'=> $item->nome,
                'produttore' => $item->produttore,
                'quantita_prodotto' => $item->pivot->quantita_prodotto,
                'codice' =>$item->codice
            ]);
        }

        return $list->all();
    }

    protected function _deleteList(){
        return Cliente::find(session('user_id'))->prodotto()->detach();
    }
}
