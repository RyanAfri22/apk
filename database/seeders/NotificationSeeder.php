<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notifications')->insert([
            [
                'user_id' => 1,
                'message' => 'Your insurance payment is due on 2024-07-01.',
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'message' => 'Your insurance payment has been received.',
                'is_read' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
