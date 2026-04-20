<?php

//データベースとの接続
require_once '../models/connect.php';
$connection = new Connect();

//テーブルからデータの取得準備
$tasks = $connection->getTasks(null);

include "../views/list.php";
