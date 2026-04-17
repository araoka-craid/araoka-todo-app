<?php

$title = $_POST['title'];
$content = $_POST['content'];

require_once 'connect.php';
$connection = new Connect();
$sql = 'INSERT INTO todo_list (title, content) VALUES(?, ?)';
$param[] = $title;
$param[] = $content; 
$stmt = $connection->query($sql, $param);

?>