<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DosenSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DosenSeeder::class,
            OrmawaSeeder::class,
        ]);
    }
}