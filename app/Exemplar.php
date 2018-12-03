<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
    protected $table = "Exemplar";

    protected $fillable = [
        'disponivel', 'arquivo', 'Livro_id',
    ];

    public $rules = [
        'disponivel' => 'required',
        'Livro_id' => 'required',
    ];
}
