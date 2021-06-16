<?php


namespace App\Http\Controllers;


class ReservedAreaController
{
    function reservedArea(){
        if (LoginController::isLogged())
            return view('reserved_area');
        return redirect(route('login'));
    }


}
