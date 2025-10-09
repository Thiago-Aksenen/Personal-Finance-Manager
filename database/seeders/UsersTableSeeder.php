<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nome' => 'Adm Pedro',
            'email' => 'pedro@gmail.com',
            'password' => Hash::make('123_User'),
            'sexo' => 'M',
            'telefone' => '1234567890',
            'descricao' => 'Administrador do sistema',
            'data_cadastro' => '2023-10-01',
            'data_nascimento' => '2008-07-08',
            'is_notificada' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
