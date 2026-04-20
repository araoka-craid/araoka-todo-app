<?php

//データベースとの接続
require_once '../models/connect.php';
$connection = new Connect();

//データの削除(idが一致したデータ)
$sql = 'DELETE FROM todo_list WHERE id = ?';
require_once "./sanitize.php";
$id = $_GET['id'];

$stmt = $connection->query($sql, [$id]);

$url = "../views/list.php";

header('Location:' . $url);
