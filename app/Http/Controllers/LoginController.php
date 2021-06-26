<?php


namespace App\Http\Controllers;


use App\models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    static function isLogged(){
        return session('username');
    }
    function login(){
        if(session('username'))
            return redirect('area_riservata');
        else
            return view('login');
    }

    function checkLogin(Request $request){
        $error = null;
        if ($request->has('email') && $request->has('password')){
            $utente = Cliente::where('email',$request['email'])->first();

            if (password_verify($request['password'],$utente->password)){
                session(['username' => $request['email'],'user_id'=>$utente->id ]);
                return redirect(route('customer_area'));
            }

            $error = "Username e/o password errati.";
        }

        if (!$request->hasAny('email','password')){
            $error = "Inserisci username e password.";

        }

        //myemail/username : admin
        //mypassword : admin
        return $error;

    }
    function logout(){
        Session::flush();
        return redirect(route('home'));
    }

}
