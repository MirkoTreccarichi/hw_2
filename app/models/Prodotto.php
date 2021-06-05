<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model{
    protected $table = 'cliente';
    public $timestamps = false;


    /**
     * The roles that belong to the user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lista()
    {
        return $this->belongsToMany(Cliente::class);
    }
}
