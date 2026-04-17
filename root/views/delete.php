<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>To do app</title>
</head>
<style>
	
</style>
<?php
 //urlからidの取得
$id = $_GET['id'];

//データベースとの接続
require_once "../models/connect.php";
$connection = new Connect();

//データの取得(idが一致したデータ)
$sql = 'SELECT * FROM todo_list WHERE id = ?';
$stmt = $connection->query($sql, [$id]);
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<body>
	<main>
		<div class="container" style="margin:auto; width:300px;">
			<h2 style= "text-align:center;">Delete</h2>
			<form method="post" action='../controllers/delete-data.php?id=<?= $rec['id'] ?>' >
				<label for="title">Title</label><br>
					<p><?= $rec['title'] ?></p>
				<label for="content">Content</label><br>
					<p><?= $rec['content'] ?></p>
					<input type="button" onclick="history.back()" value="Cancel">
					<input type="submit" value="Delete">
			</form>
		</div>
	<main>
</body>

</html>