<?php


namespace App\Http\Controllers;


class HomeController extends Controller
{
    function home(){
        return view('guest');
    }

    function welcome(){
        return view('welcome');
    }
}
