<?php
//データベースとの接続
require_once '../models/connect.php';
$connection = new Connect();

//データの追加
$sql = 'INSERT INTO todo_list (title, content) VALUES(?, ?)';
require_once "./sanitize.php";
$posts = sanitize($_POST);
$title = $posts['title'];
$content = $posts['content'];

//データのバリデーション
if (empty($title) || empty($content)) {
    ?>
<div style="text-align:center">
    <p>Please enter all data! </p>
    <input type='button' onclick='history.back()' value='Back'>
</div>
<?php
        exit();
}
$param[] = $title;
$param[] = $content;
$stmt = $connection->query($sql, $param);

$url = "../views/list.php";

header('Location:' . $url);

?>