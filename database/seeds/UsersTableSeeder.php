<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cpf' => '123456789',
            'telefone' => '32988177455',
            'name'  => 'João Paulo',
            'password' => bcrypt('123'),
            'email' => 'j@j.com',
            'tipo' => 'Administrador',
            'punicao' => '0',

        ]);
    }
}
