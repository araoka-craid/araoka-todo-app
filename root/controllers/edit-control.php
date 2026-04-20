<?php

require_once "../models/validate.php";
require_once '../models/connect.php';
require_once "../models/sanitize.php";

//データベースとの接続
$connection = new Connect();

if (isset($_GET['id'])) {
    $data = $connection->getTasks([$_GET['id']]);
    include '../views/delete.php';
} else {
    //XSS対策
    $sanitize = new Sanitization();
    $posts = $sanitize->sanitize($_POST);

    $title = $posts['title'];
    $content = $posts['content'];
    $id = $posts['id'];

    $param[] = $title;
    $param[] = $content;
    $param[] = $id;
    $stmt = $connection->editTasks($param);

    $url = "../controllers/list-control.php";
    header('Location:' . $url);
}
