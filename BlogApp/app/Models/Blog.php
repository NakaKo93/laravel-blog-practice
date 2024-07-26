<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Blog
{
    /**
     * DBから投稿済みの記事をすべて取得
     * 
     * @return collection|false 取得したデータ|取得したデータなし
     */
    public static function FindAll() {
        return DB::table('blogs')
                    ->select('blog_id', 'title', 'explanation', 'published_date')
                    ->where('delete_flg', false)
                    ->where('published_flg', true)
                    ->orderByDesc('published_date')
                    ->get();
    }

    /**
     * 新規記事をDBに保存
     * 
     * @param array $blog 記事データ
     */
    public static function Create($blog): void
    {
        DB::table('blogs')->insert($blog);
    }

    /**
     * DBから検索条件に沿って記事をすべて取得
     * 
     * @param array $conditions
     * @return collection 取得したデータ
     */
    public static function Search($conditions) {
        return DB::table('blogs as b')
                    ->join('blog_categories as bc', 'b.blog_id', '=', 'bc.blog_id')
                    ->join('categories as c', 'bc.category_id', 'c.category_id')
                    ->select('b.blog_id', 'b.title', 'b.explanation', 'b.published_date', 'c.category_name')
                    ->where('b.delete_flg', false)
                    ->where('b.published_flg', $conditions['published_flg'])
                    ->where('b.published_date', '>=', $conditions['published_date'])
                    ->where('c.category_id', $conditions['category_id'])
                    ->get();
    }
}
