<?php

namespace App\models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Lista extends Pivot {
    protected $table = 'lista';
    public $timestamps = false;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_cliente','codice_prodotto'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantita_prodotto'
    ];



}
