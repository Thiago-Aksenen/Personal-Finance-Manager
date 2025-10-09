<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ReceitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('receitas')->insert([
            'data_receita' => '2023-10-01',
            'categoria' => 'Salário',
            'valor' => 5000.00,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('receitas')->insert([
            'data_receita' => '2023-10-05',
            'categoria' => 'Freelance',
            'valor' => 1200.00,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('receitas')->insert([
            'data_receita' => '2023-10-10',
            'categoria' => 'Investimentos',
            'valor' => 300.00,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
