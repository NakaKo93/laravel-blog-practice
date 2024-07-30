<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\ApodRequest;
use App\Services\ApodService;

class ApodController extends Controller
{
    /**
     * apodからデータを取得
     * 
     * @param \App\Http\Requests\ApodRequest $request バリデーション済みのデータ
     * @return Illuminate\Http\Response
     */
    public function ApodProcess(ApodRequest $request) {
        Log::debug(__CLASS__.'::getApod');
        $date = $request->all();
        $responseBody = ApodService::Get($date);

        return response()->json($responseBody, 200);
    }
}
