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
            'nome' => 'Admin User',
            'email' => 'onlyuser@hotmail.com',
            'password' => Hash::make('123User!'),
            'sexo' => 'M',
            'telefone' => '1234567890',
            'descricao' => 'Administrador do sistema',
            'data_cadastro' => '2023-10-01',
            'data_nascimento' => '1990-01-01',
            'is_notificada' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
