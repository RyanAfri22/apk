<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'email' => 'admin@example.com',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user1',
                'password' => Hash::make('user1234'),
                'email' => 'user1@example.com',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user2',
                'password' => Hash::make('user1234'),
                'email' => 'user2@example.com',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
