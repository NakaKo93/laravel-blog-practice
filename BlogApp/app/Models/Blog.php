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
        $blogs = DB::table('blogs')
                    ->select('blog_id', 'title', 'explanation', 'published_date')
                    ->where('delete_flg', false)
                    ->where('published_flg', true)
                    ->get();

        if ($blogs->isEmpty()) {
            return false;
        }

        return $blogs;
    }

    /**
     * 新規記事をDBに保存
     * 
     * @param array $blog 記事データ
     * @return boolean 記事データの作成可否
     */
    public static function Create($blog) {
        DB::beginTransaction();

        try {
            DB::table('blogs')->insert($blog);
            DB::commit();

            return true;
        } catch (Exeption $e) {
            DB::rolback();

            Log::error('投稿を登録する時にエラーが発生しました。');
            throw $e;
            
            return false;
        }
    }

    /**
     * DBから検索条件に沿って記事をすべて取得
     * 
     * @param array $conditions
     * @return collection 取得したデータ
     */
    public static function Search($conditions) {
        $blogs = DB::table('blogs as b')
                    ->join('blog_categories as bc', 'b.blog_id', '=', 'bc.blog_id')
                    ->join('categories as c', 'bc.category_id', 'c.category_id')
                    ->select('b.blog_id', 'b.title', 'b.explanation', 'b.published_date', 'c.category_name')
                    ->where('b.delete_flg', false)
                    ->where('b.published_flg', $conditions['published_flg'])
                    ->where('b.published_date', '>=', $conditions['published_date'])
                    ->where('c.category_id', $conditions['category_id'])
                    ->get();

        return $blogs;
    }
}
