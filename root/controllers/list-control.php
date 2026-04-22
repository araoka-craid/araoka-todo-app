<?php

require_once __DIR__ . '/../models/database/todo_list.php';

$database = new TodoList();

//テーブルからデータの取得準備
$tasks = $database->getTasks(null);

include "../views/list.php";
