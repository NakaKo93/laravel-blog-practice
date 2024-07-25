<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [            
                'blog_id' => 1,
                'title' => 'java',
                'explanation' => 'javaのテスト',
                'published_date' => date("Y-m-d H:i:s", mktime(15, 16, 36, 7, 23, 2024)),
                'published_flg' => true,
                'delete_flg' => false,
            ],
            [
                'blog_id' => 2,
                'title' => 'Laravel',
                'explanation' => 'javaのテスト',
                'published_date' => date("Y-m-d H:i:s", mktime(15, 16, 36, 7, 23, 2024)),
                'published_flg' => true,
                'delete_flg' => false,
            ],
            [
                'blog_id' => 3,
                'title' => 'Java',
                'explanation' => 'javaのテスト',
                'published_date' => date("Y-m-d H:i:s", mktime(15, 16, 36, 7, 23, 2024)),
                'published_flg' => true,
                'delete_flg' => true,
            ],
        ]);
    }
}
