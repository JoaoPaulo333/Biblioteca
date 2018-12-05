<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "Reserva";

    protected $fillable = [
        'data','correspondido', 'Livro_id', 'Usuario_id',
    ];


    public $rules = [
        'data' => 'required',
        'Livro_id' => 'required',
        'Usuario_id' => 'required',
    ];
}
