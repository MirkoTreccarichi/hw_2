<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Punto_vendita extends Model{
    protected $table = 'punto_vendita';
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'indirizzo','citta','partita_iva','src_img'
    ];
}
