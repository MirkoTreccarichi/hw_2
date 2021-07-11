<?php


namespace App\Http\Controllers;


use App\models\Cliente;
use Illuminate\Http\Request;
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

        if(Cliente::where('email',$request->input('email'))->exists()){
            $error = "Email già presente !";
        }

        if(isset($error))
            return view('signup')->with('error',$error);

        Cliente::create([
            'nome'=>$request->input('name'),
            'cognome'=>$request->input('surname'),
            'data_nascita'=>$request->input('birthdate'),
            'email'=>$request->input('email'),
            'password'=>password_hash($request->input('password'),PASSWORD_BCRYPT)
        ]);

        //fixme settare direttamente la sessione o fargli fare comunque il login ?
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

        $exists = Cliente::where('email',$request->input('email'))->exists();

      return Json::encode($exists);
    }
}
