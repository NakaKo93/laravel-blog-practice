<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogFavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_favorites')->insert([
            [
                'id' => 1,
                'blog_id' => 1,
                'favorite_id' => 1,
            ],
            [
                'id' => 2,
                'blog_id' => 2,
                'favorite_id' => 2,
            ],
            [
                'id' => 3,
                'blog_id' => 3,
                'favorite_id' => 3,
            ],
        ]);
    }
}
