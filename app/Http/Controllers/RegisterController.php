<?php


namespace App\Http\Controllers;


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
        //todo email in input libera?
    }
}
