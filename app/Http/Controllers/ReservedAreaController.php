<?php


namespace App\Http\Controllers;


use App\models\Punto_vendita;
use Psy\Util\Json;

class ReservedAreaController
{
    function reservedArea(){
        if (LoginController::isLogged())
            return view('reserved_area');
        return redirect(route('login'));
    }

    function loadCustomerPoint(){
       $puntiVendita = Punto_vendita::all();
        $affiliates = array();
        foreach ($puntiVendita as $aff) {
            array_push($affiliates,
                array('title' => $aff->citta,'src' =>  $aff->src_img,'address' =>  $aff->indirizzo));
        }

        return Json::encode($affiliates);
    }

}
