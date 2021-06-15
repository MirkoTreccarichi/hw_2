<?php


namespace App\Http\Controllers;


use App\models\Cliente;
use Illuminate\Http\Request;
use Psy\Util\Json;

class RegisterController extends Controller
{
    function register(){
    //todo funzione di registrazione nel db
    }

    function page(){
        return view('signup');
    }

    function emailFree(Request $request){
        if(!$request->input('email'))
            return false;

        $cliente = Cliente::where('email',$request->input('email'))->first();

        if($cliente != null) {
            return Json::encode(false);
        }
        return Json::encode(true);
    }
}
