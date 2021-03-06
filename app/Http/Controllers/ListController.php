<?php


namespace App\Http\Controllers;

use App\models\Cliente;
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
            if (!$request->hasCookie(session('user_id').'list')){
                return $response->withCookie(cookie()
                    ->forever(session('user_id').'list',
                        Json::encode(null)));
            }

            return $request->cookie(session('user_id').'list');

        }
        if (!$request->has('prodotto0')){
            if ($request->hasCookie(session('user_id').'list')){
                $response->withCookie(cookie()->forever('list',null));
                return $response;
            }
        }

        $response->withCookie(cookie()
            ->forever(
                session('user_id').'list',
                Json::encode($request->query()))
        );
        $response->setData($request->query());

        return $response;
    }

    protected function _saveList(Request $request): ?JsonResponse
    {
        $response = new JsonResponse();

        Cliente::find(session('user_id'))->prodotto()
            ->detach($request['codice_prodotto']);
        Cliente::find(session('user_id'))->prodotto()
            ->attach($request['codice_prodotto'], ['quantita_prodotto' => $request['quantita']]);

        $lista = self::_loadProductsList();

        $response->setData($lista);
        return $response->withCookie(cookie()
            ->forever(session('user_id').'list',
                Json::encode(null)));
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
