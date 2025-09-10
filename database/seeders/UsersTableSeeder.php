<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'user1',
                'email' => 'user1@email.com',
                'password' => Hash::make('abc123456'),
                'created_at' => now(),
            ],
            [
                'username' => 'user2',
                'email' => 'user2@email.com',
                'password' => Hash::make('abc123456'),
                'created_at' => now(),
            ],
            [
                'username' => 'user3',
                'email' => 'user3@email.com',
                'password' => Hash::make('abc123456'),
                'created_at' => now(),
            ],
        ]);
    }
}
