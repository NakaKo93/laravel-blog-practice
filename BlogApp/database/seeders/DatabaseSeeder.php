<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Database\Seeders\FavoriteSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BlogSeeder::class,
            // FavoriteSeeder::class,
            // BlogFavoriteSeeder::class,
            CategorySeeder::class,
            BlogCategorySeeder::class,
        ]);
    }
}
