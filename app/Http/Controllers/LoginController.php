<?php


namespace App\Http\Controllers;


class LoginController extends Controller
{
    function login(){
        $username = session('username');
        if(session('username'))
            redirect('area_riservata');
        else
            return view('login');
    }

    function checkLogin(){
//        todo funzione checklogin controller
    }
    function logout(){
//        todo funzione logout controller
    }

}
