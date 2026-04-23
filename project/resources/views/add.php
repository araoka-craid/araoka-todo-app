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
			<h2 style= "text-align:center;">To add tasks</h2>
			<form method="post" action='/add' >
				<label for="title">Title</label><br>
					<input type="text" name= "title" style="width:250px"><br />
				<?php if (isset($errors['title'])): ?>
					<p style = "color:red;"><?= $errors['title'] ?></p>
				<?php endif; ?>
				<label for="content">Content</label><br>
					<textarea type="text" name="content" rows="5" cols="40" ></textarea><br />
				<?php if (isset($errors['content'])): ?>
					<p style = "color:red;"><?= $errors['content'] ?></p>
				<?php endif; ?>
					<input type="button" onclick="history.back()" value="Cancel">
					<input type="submit" value="OK">
			</form>
		</div>
	</main>
</body>

</html>