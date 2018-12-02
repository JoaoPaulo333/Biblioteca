<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "Categoria";

    protected $fillable = [
        'nome', 'assunto', 'descricao',
    ];

    public $rules = [
        'nome' => 'required|min:3',
        'assunto' => 'required',
        'descricao' => 'required',
    ];
}
