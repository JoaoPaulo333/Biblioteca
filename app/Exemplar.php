<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
    private $table = "Exemplar";

    protected $fillable = [
        'disponivel', 'arquivo', 'Livro_id',
    ];
}
