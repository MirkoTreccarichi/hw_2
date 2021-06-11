<?php


namespace App\Http\Controllers;


class RegisterController extends Controller
{
    function register(){
    //todo funzione di registrazione nel db
    }

    function page(){
        return view('signup');
    }
}
