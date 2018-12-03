<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = "Emprestimo";

    protected $fillable = [
        'dataIda', 'dataVolta', 'Usuario_id', 'Exemplar_id',
    ];
    public $rules = [
        'Usuario_id' => 'required',
        'Exemplar_id' => 'required',
    ];
}
