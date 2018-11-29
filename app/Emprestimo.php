<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    private $table = "Emprestimo";

    protected $fillable = [
        'dataIda', 'dataVolta', 'Usuario_id', 'Exemplar_id',
    ];
}
