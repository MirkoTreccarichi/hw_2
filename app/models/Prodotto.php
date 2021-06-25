<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model{
    protected $table = 'prodotto';
    public $timestamps = false;


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'codice';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'codice'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'produttore','prezzo_punti','prezzo','tipo','nome','src'
    ];

    /**
     * The roles that belong to the user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cliente()
    {
        return $this->belongsToMany('App\models\Cliente',
            'App\models\Lista','codice_prodotto',
            'id_cliente','codice','id')
        ->withPivot('quantita_prodotto');
    }
}
