<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogSearchRequest;
use Illuminate\Support\Facades\Log;
use App\Services\ResponseService;

class BlogController extends Controller
{
    /**
     * 投稿済みの記事をすべて取得
     * 
     * @return Illuminate\Http\Response
     */
    public function FindAllBlog() {
        try {
            $blogs = Blog::FindAll();
        } catch (Exeption $e) {
            throw $e;
        }

        if ($blogs->isEmpty()) {
            Log::error('blogsテーブルのデータが0件です。');
            $response = ResponseService::ErrorResponse(404,'データが取得できませんでした。');
            return response()->json($response, 404);
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

        $response = ResponseService::NormalResponse(200,'登録に成功しました。');
        return response()->json($response, 200);
    }

    /**
     * 記事を検索
     * 
     * @param \App\Http\Requests\BlogSearchRequest $request バリデーション済みの検索条件データ
     * @return Illuminate\Http\Response
     */
    public function SearchBlogProcess(BlogSearchRequest $request) {
        try {
            $conditions = $request->all();
        } catch (Exeption $e) {
            throw $e;
        }

        $blogs = Blog::Search($conditions);

        return response()->json($blogs, 200);
    }
}
