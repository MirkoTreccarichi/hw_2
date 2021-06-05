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



}
