<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Blog
{
    /**
     * DBから投稿済みの記事をすべて取得
     * 
     * @param null
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

            error_log('投稿を登録する時にエラーが発生しました。');
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
        $blogs = DB::table('blogs')
                    ->join('blog_categories', 'blogs.blog_id', '=', 'blog_categories.blog_id')
                    ->join('categories', 'blog_categories.category_id', 'categories.category_id')
                    ->select('blogs.blog_id', 'blogs.title', 'blogs.explanation', 'blogs.published_date', 'categories.category_name')
                    ->where('blogs.delete_flg', false)
                    ->where('blogs.published_flg', $conditions['published_flg'])
                    ->where('blogs.published_date', $conditions['published_date'])
                    ->where('categories.category_id', $conditions['category_id'])
                    ->get();

        return $blogs;
    }
}
