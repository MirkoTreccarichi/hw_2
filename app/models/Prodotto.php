<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model{
    protected $table = 'cliente';
    public $timestamps = false;


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
    public function lista()
    {
        return $this->belongsToMany(Cliente::class);
    }
}
