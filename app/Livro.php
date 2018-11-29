<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    private $table = "Livro";

    protected $fillable = [
        'titulo', 'isbn', 'edicao', 'editora', 'ano', 'Autor_id', 'Categoria_id',
    ];
}
