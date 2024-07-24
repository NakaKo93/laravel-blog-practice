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
    }
}
