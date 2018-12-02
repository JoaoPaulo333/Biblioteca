<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = "Autor";

    protected $fillable = [
        'nome',
    ];

    public $rules = [
        'nome' => 'required|min:3',
    ];
}
