<?php 
session_start();
// JSONファイルのパス
$json_file = __DIR__ . '/posts.json';
// POSTでデータが送信された場合
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['message'])) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    
    // 新しい投稿データ
    $new_post = array(
        'name' => $name,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    );
    // 既存のJSONデータを読み込む
    $posts = array();
    if(file_exists($json_file)) {
        $json_data = file_get_contents($json_file);
        $posts = json_decode($json_data, true);
        if(!is_array($posts)) {
            $posts = array();
        }
    }   
    // 新しい投稿を追加
    $posts[] = $new_post;
    
    // JSONファイルに保存
    file_put_contents($json_file, json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
// JSONから投稿データを読み込む
$posts = array();
if(file_exists($json_file)) {
    $json_data = file_get_contents($json_file);
    $posts = json_decode($json_data, true);
    if(!is_array($posts)) {
        $posts = array();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿フォーム</title>
</head>
<body>
    <div>
        <h1>掲示板</h1>
        <form method="POST">
            <div>
                <label>name:</label><br>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>massage:</label><br>
                <input type="text" name="message" required>
            </div>
            <button type="submit">投稿</button>
        </form>
        <h2>投稿一覧</h2>
        <div>
            <?php
            if(!empty($posts)) {
                // 逆順で表示（新しい投稿が上）
                foreach(array_reverse($posts) as $post) {
                    echo '<div class="post">';
                    echo '<span class="post-name">' . $post['name'] . '</span>';
                    echo ' <span class="post-time">' . $post['timestamp'] . '</span><br>';
                    echo '<p>' . $post['message'] . '</p>';

                }
            };
            ?>
        </div>
    </div>
</body>
</html>