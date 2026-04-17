<?php
//データベースとの接続
require_once '../models/connect.php';
$connection = new Connect();

//データの更新(idが一致したデータ)
$sql = 'UPDATE todo_list set title = ?, content = ? WHERE id = ?';
//XSS対策
require_once "./sanitize.php";
$posts = sanitize($_POST);
$title = $posts['title'];
$content = $posts['content'];
$id = $posts['id'];

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
$param[] = $id;
$stmt = $connection->query($sql, $param);

$url = "../views/list.php";

header('Location:' . $url);

?>