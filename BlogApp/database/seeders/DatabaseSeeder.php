<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [            
                'blog_id' => 1,
                'title' => 'いいニュース',
                'explanation' => 'いいニュースの内容',
            ],
            [
                'blog_id' => 2,
                'title' => '普通のニュース',
                'explanation' => '普通のニュースの内容',
            ],
            [
                'blog_id' => 3,
                'title' => '悪いニュース',
                'explanation' => '悪いニュースの内容',
            ],
        ]);

        DB::table('favorites')->insert([
            [
                'favorite_id' => 1,
            ],
            [
                'favorite_id' => 2,
            ],
            [
                'favorite_id' => 3,
            ],
        ]);

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
