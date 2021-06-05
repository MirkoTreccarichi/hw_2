<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table = 'cliente';
    public $timestamps = false;


    /**
     * The roles that belong to the user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lista()
    {
        /*return $this->belongsToMany(Prodotto::class,
            "lista","id_cliente",
            "codice_prodotto")->withPivot("quantita_prodotto");*/
        return $this->belongsToMany(Prodotto::class)->using(Lista::class);
    }
}
