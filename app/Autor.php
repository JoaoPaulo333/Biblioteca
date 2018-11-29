<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    private $table = "Autor";

    protected $fillable = [
        'nome',
    ];
}
