<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- オリジナルなCSSの読み込み -->
        @vite('resources/css/app.css')
    <!-- JQueryCDNの読み込み -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <!-- オリジナルなJSの読み込み -->
        @vite('resources/js/connection.js')

    <title>API action</title>
</head>
<body>
    <div class="table">
        <h1>公開済み投稿一覧</h1>
        <div id="blogs-get-list"></div>
        <botton id="blogs-get-botton">取得</botton>
    </div>
    <div classs="table">
        <h1>投稿作成</h1>
        <form method="post" id="blogs-post-form">
            <div>
                <h2>タイトル</h2>
                <input type="text" name="title" id="title">
                <p id="error-title"></p>
            </div>
            <div>
                <h2>内容</h2>
                <input type="text" name="explanation" id="explanation">
                <p id="error-explanation"></p>
            </div>
            <div>
                <p id="blogs-success-message"></p>
                <input type="submit" id="blogs-post-botton" value="送信">
            </div>
        </form>
    </div>
</body>