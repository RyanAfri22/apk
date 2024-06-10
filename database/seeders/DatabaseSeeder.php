<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;use App\Models\Insurance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AccountSeeder::class,
            TransactionSeeder::class,
            InsuranceSeeder::class,
            InsurancePaymentSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}
