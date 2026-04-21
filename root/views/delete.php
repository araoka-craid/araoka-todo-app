<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>To do app</title>
</head>
<style>
	
</style>
<body>
	<main>
		<div class="container" style="margin:auto; width:300px;">
			<h2 style= "text-align:center;">Delete</h2>
			<form method="post" action='../controllers/delete-control.php?delete_id=<?= $data['id'] ?>' >
				<label for="title">Title</label><br>
					<p><?= $data['title'] ?></p>
				<label for="content">Content</label><br>
					<p><?= $data['content'] ?></p>
					<input type="button" onclick="history.back()" value="Cancel">
					<input type="submit" name="delete" value="Delete">
			</form>
		</div>
	</main>
</body>

</html>