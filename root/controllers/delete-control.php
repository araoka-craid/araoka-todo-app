<?php

require_once '../models/connect.php';
require_once "../models/sanitize.php";

//データベースとの接続
$connection = new Connect();

if (isset($_GET['id'])) {
    $data = $connection->getTasks([$_GET['id']]);
    include '../views/delete.php';
} else {
    $connection->deleteTasks($_GET['delete_id']);
    $url = "../controllers/list-control.php";
    header('Location:' . $url);
}
