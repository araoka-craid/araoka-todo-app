<?php

require_once __DIR__ . '/../models/connect.php';

$connection = new Connect();

//テーブルからデータの取得準備
$tasks = $connection->getTasks(null);

include "../views/list.php";
