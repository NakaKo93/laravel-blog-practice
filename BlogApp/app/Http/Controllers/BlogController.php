<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use \App\Http\Requests\BlogCreateRequest;
use \App\Http\Requests\BlogSearchRequest;

class BlogController extends Controller
{
    /**
     * 投稿済みの記事をすべて取得
     * 
     * @param null
     * @return Illuminate\Http\Response
     */
    public function FindAllBlog() {
        $blogs = Blog::FindAll();
        if (empty($blogs)) {
            error_log('logsテーブルのデータが0件です。');
            $error = [
                'error' =>
                    [
                        'code' => '404',
                        'message' => 'データが取得できませんでした。'
                    ]
            ];
            return response()->json($error, 404);
        }

        return response()->json($blogs, 200);
    }

    /**
     * 記事を新規作成
     * 
     * @param \App\Http\Requests\BlogCreateRequest $request バリデーション済みの記事データ
     * @return Illuminate\Http\Response
     */
    public function CreateBlogProcess(BlogCreateRequest $request) {
        $blog = $request->all();
        $result = Blog::Create($blog);

        if ($result) {
            $response = [
                'state' => '200',
                'message' => '登録に成功しました。'
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * 記事を検索
     * 
     * @param \App\Http\Requests\BlogSearchRequest $request バリデーション済みの検索条件データ
     * @return Illuminate\Http\Response
     */
    public function SearchBlogProcess(BlogSearchRequest $request) {
        $conditions = $request->all();
        $blogs = Blog::Search($conditions);

        return response()->json($blogs, 200);
    }
}
