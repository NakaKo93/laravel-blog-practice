<?php

namespace App\Services;

class ResponseService
{
    /**
     * 正常時のレスポンス
     * 
     * @param int $status ステータスコード
     * @return string $message メッセージ
     */
    public static function NormalResponse($status, $message) {
        return [
            'state' => $status,
            'message' => $message
        ];
    }

    /**
     * エラー時のレスポンス
     * 
     * @param int $status ステータスコード
     * @return string $message メッセージ
     */
    public static function ErrorResponse($status, $message) {
        return [
            'error' =>
                [
                    'code' => $status,
                    'message' => $message
                ]
        ];
    }
}