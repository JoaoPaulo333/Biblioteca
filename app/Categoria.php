<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    private $table = "Categoria";

    protected $fillable = [
        'nome', 'assunto', 'descricao',
    ];
}
