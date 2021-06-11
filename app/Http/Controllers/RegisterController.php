<?php


namespace App\Http\Controllers;


use App\models\Cliente;
use Illuminate\Http\Request;

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
            return false;
        }
        return true;
    }
}
