<?php


namespace App\Http\Controllers;


use App\models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function login(){
        if(session('username'))
            return redirect('area_riservata');
        else
            return view('login');
    }

    function checkLogin(Request $request){
        if ($request->has('email') && $request->has('password')){
            $utente = Cliente::where('email',$request->input('email'))->first();

            if (password_verify($request->input('password'),$utente->password)){
                session(['username','user_id'],[$request->input('email'),$utente->id]);
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
