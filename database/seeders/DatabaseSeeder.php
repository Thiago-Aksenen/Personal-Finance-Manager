<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
 /**
 * Run the database seeds.
 */
 public function run(): void
 {
 // Chamar outras seeders aqui
    $this->call(UsersTableSeeder::class);
    $this->call(ReceitasTableSeeder::class);
    $this->call(DespesasTableSeeder::class);
 }
}