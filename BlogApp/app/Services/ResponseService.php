<?php

namespace App\Services;

class ResponseService {
    /**
     * 正常時のレスポンス
     * 
     * @param string $message メッセージ
     * @return Illuminate\Http\Response
     */
    public static function NormalResponse($message) {
        $responseContent = [
            'status' => 200,
            'message' => $message
        ];

        return response()->json($responseContent, 200);
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