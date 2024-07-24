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
                'title' => 'いいインテリア',
                'explanation' => 'いいインテリアの内容',
                'published_date' => null,
                'published_flg' => false,
                'delete_flg' => false,
            ],
            [
                'blog_id' => 2,
                'title' => '普通の料理',
                'explanation' => '普通の料理の内容',
                'published_date' => date("Y-m-d H:i:s", mktime(13, 16, 59, 5, 24, 2001)),
                'published_flg' => false,
                'delete_flg' => false,
            ],
            [
                'blog_id' => 3,
                'title' => '悪い映画',
                'explanation' => '悪い映画の内容',
                'published_date' => date("Y-m-d H:i:s"),
                'published_flg' => true,
                'delete_flg' => true,
            ],
        ]);
    }
}
