<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "Reserva";

    protected $fillable = [
        'data', 'Livro_id', 'Usuario_id',
    ];
}
