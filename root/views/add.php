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
			<form method="post" action='../controllers/add-data.php' >
				<label for="title">Title</label><br>
					<input type="text" name= "title" style="width:250px" required><br />
				<label for="content">Content</label><br>
					<textarea type="text" name="content" rows="5" cols="40" required></textarea><br />
					<input type="button" onclick="history.back()" value="Cancel">
					<input type="submit" value="OK">
			</form>
		</div>
	<main>
</body>

</html>