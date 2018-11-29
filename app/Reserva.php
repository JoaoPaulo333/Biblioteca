<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    private $table = "Reserva";

    protected $fillable = [
        'data', 'Livro_id', 'Usuario_id',
    ];
}
