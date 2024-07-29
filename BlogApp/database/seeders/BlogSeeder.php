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
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [            
                'blog_id' => 1,
                'title' => 'java',
                'explanation' => 'javaのテスト',
                'published_date' => date("Y-m-d H:i:s", mktime(0, 0, 0, 6, 23, 2024)),
                'published_flg' => 1,
                'delete_flg' => 0
            ],
            [            
                'blog_id' => 2,
                'title' => 'Laravel',
                'explanation' => 'Laravelのテスト',
                'published_date' => null,
                'published_flg' => 0,
                'delete_flg' => 1
            ],
            [            
                'blog_id' => 3,
                'title' => 'Laravel',
                'explanation' => 'Laravelのテスト',
                'published_date' => date("Y-m-d H:i:s", mktime(0, 0, 0, 7, 23, 2024)),
                'published_flg' => 1,
                'delete_flg' => 0
            ]
        ]);
    }
}
