<?php


namespace App\Http\Controllers;


use App\models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Psy\Util\Json;

class RegisterController extends Controller
{
    function register(Request $request){
        if(session('_user_id'))
            redirect(route('login'));
        if(!$request->hasAny(['email','password','confirm_password','name','surname','birthdate']) ){
            if (isset($_POST["email"]) || isset($_POST["password"]))
                if(!$request->hasAny(['email','password']))
                    $error = "Inserisci email e password.";
        }

        Http::post(route('emailFree'),['email',$request->input('email')]) ? : $error[] = "email già utilizzata";

        if(isset($error))
            return($error);

        Cliente::create([
            'nome'=>$request->input('name'),
            'cognome'=>$request->input('surname'),
            'data_nascita'=>$request->input('birthdate'),
            'email'=>$request->input('email'),
            'password'=>password_hash($request->input('password'),PASSWORD_BCRYPT)
        ]);

        return redirect(route('customer_area'));

        //myemail/username : admin
        //mypassword : admin
    }

    function page(){
        return view('signup');
    }

    function emailFree(Request $request){
        if(!$request->input('email'))
            return false;

        $cliente = Cliente::where('email',$request->input('email'))->first();

        if($cliente !== null) {
            return Json::encode(false);
        }
        return Json::encode(true);
    }
}
