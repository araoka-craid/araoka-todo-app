<?php

require_once "../models/validate.php";
require_once "../models/sanitize.php";

$validator = new Validator();
$errors = $validator->validate($_POST);

if (empty($errors)) {
    //データベースとの接続
    require_once '../models/connect.php';
    $connection = new Connect();

    //データの追加
    $sanitize = new Sanitization();
    $posts = $sanitize->sanitize($_POST);
    $title = $posts['title'];
    $content = $posts['content'];

    $param[] = $title;
    $param[] = $content;
    $connection->addTasks($param);

    $url = "../controllers/list-control.php";

    header('Location:' . $url);

} else {
    include '../views/add.php';
}
