<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf', 'telefone', 'name', 'password', 'email', 'tipo', 'punicao','dataPunicao',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $rules = [
        'name' => 'required|min:3',
        'cpf' => 'required|min:11|max:11',
        'telefone' => 'required|min:8|max:13',
        'password' => 'required|min:6',
        'password' => 'required|min:6',
        'tipo' => 'required',
    ];
}
