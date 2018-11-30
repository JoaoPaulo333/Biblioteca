<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = "Livro";

    protected $fillable = [
        'titulo', 'isbn', 'edicao', 'editora', 'ano', 'Autor_id', 'Categoria_id',
    ];

    public $rules = [
        'titulo' => 'required|min:3',
        'isbn' => 'required|numeric',
        'edicao' => 'required',
        'editora' => 'required',
        'ano' => 'required|numeric',
        'Autor_id' => 'required',
        'Categoria_id' => 'required',
    ];
}
