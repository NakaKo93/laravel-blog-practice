<?php

namespace App\Services;

class ResponseService
{
    /**
     * 正常時のレスポンス
     * 
     * @param int $status ステータスコード
     * @param string $message メッセージ
     * @return Illuminate\Http\Response
     */
    public static function NormalResponse($status, $message) {
        $responseContent = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($responseContent, $status);
    }

    /**
     * エラー時のレスポンス
     * 
     * @param int $status ステータスコード
     * @param string $message メッセージ
     * @return Illuminate\Http\Response
     */
    public static function ErrorResponse($status, $message) {
        $responseContent = [
            'error' =>
                [
                    'code' => $status,
                    'message' => $message
                ]
        ];

        return response()->json($responseContent, $status);
    }
}