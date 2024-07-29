<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class FormatBlogService {
    /**
     * 記事データを別のフォーマットに修正
     * 
     * @param collection $blog 記事データ
     * @return collection 変換した記事データ
     */
    public static function FormatAllBlog($blogs) {
        $blogs->map(function ($blog) {
            if ($blog->published_flg) {
                $blog->published_flg = '公開済み';
            } else {
                $blog->published_flg = '下書き';
            }
    
            if ($blog->delete_flg) {
                $blog->delete_flg = '削除済み';
            } else {
                $blog->delete_flg = '未削除';
            }
    
            if ($blog->published_date) {
                $blog->published_date = date('Y年m月d日H時i分', strtotime($blog->published_date));
            }
        });

        return $blogs;
    }
}