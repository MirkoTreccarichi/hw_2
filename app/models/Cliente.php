<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table = 'cliente';
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','cognome','data_nascita','email','password'
    ];

    /**
     * The roles that belong to the user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Prodotto()
    {
        return $this->belongsToMany('App\models\Prodotto',
            'App\models\Lista','id_cliente',
            'codice_prodotto','id','codice')
        ->withPivot('quantita_prodotto');
    }
}
