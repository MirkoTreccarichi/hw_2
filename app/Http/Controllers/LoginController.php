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
            return view('login')->with('error');
    }

    function checkLogin(Request $request){
        $error = null;
        if ($request['email'] !== null && $request['password'] !== null){
            $utente = Cliente::where('email',$request['email'])->first();

            if ($utente && password_verify($request['password'],$utente->password)){
                session(['username' => $request['email'],'user_id'=>$utente->id ]);
                return redirect(route('customer_area'));
            }

            $error = "Email e/o password errati.";
        }

        if ($request['email'] === null || $request['password'] === null ){
            $error = "Inserisci email e password.";

        }

        //myemail/username : admin
        //mypassword : admin
        if (isset($error))
            return view('login')->with('error',$error);
        return null;

    }
    function logout(){
        Session::flush();
        return redirect(route('home'));
    }

}
