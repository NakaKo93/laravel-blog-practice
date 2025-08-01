<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ItemNotFoundException;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogSearchRequest;
use App\Services\ResponseService;
use App\Services\FormatBlogService;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * 投稿済みの記事をすべて取得
     * 
     * @return Illuminate\Http\Response
     */
    public function FindAllPublishedBlog() {
        try {
            $blogs = Blog::FindAllPublished();

            if ($blogs->isEmpty()) {
                throw new ItemNotFoundException('blogsテーブルのデータが0件です。');
            }
        } catch (ItemNotFoundException $e) {
            Log::error($e);
            return ResponseService::ErrorResponse(404, 'データが取得できませんでした。');
        }

        return response()->json(['blogs' => $blogs], 200);
    }

    /**
     * 投稿済みの記事をすべて取得
     * 
     * @return Illuminate\Http\Response
     */
    public function FindAllBlog() {
        Log::debug(__CLASS__."::".__FUNCTION__.' "START"');
        try {
            $blogs = Blog::FindAll();
            $blogs = FormatBlogService::FormatAllBlog($blogs);
        } catch (\Exception $e) {
            throw $e;
        }
        Log::debug(__CLASS__."::".__FUNCTION__.' "END"');

        return response()->json(['blogs' => $blogs], 200);
    }

    /**
     * 記事を新規作成
     * 
     * @param \App\Http\Requests\BlogCreateRequest $request バリデーション済みの記事データ
     * @return Illuminate\Http\Response
     */
    public function CreateBlogProcess(BlogCreateRequest $request) {
        $blog = $request->all();

        DB::beginTransaction();
        try {
            Blog::Create($blog);
            DB::commit();
        } catch (\Exception $e) {
            Log::error('投稿を登録する時にエラーが発生しました。');
            DB::rolback();
            throw $e;
        }

        return ResponseService::NormalResponse('登録に成功しました。');
    }

    /**
     * 記事を検索
     * 
     * @param \App\Http\Requests\BlogSearchRequest $request バリデーション済みの検索条件データ
     * @return Illuminate\Http\Response
     */
    public function SearchBlogProcess(BlogSearchRequest $request) {
        $conditions = $request->all();

        try {
            $blogs = Blog::Search($conditions);
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json($blogs, 200);
    }
}
