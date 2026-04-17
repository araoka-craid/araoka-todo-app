<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>To do app</title>
</head>

<body>
    <div class="container">
        <h2>To Do 追加</h2><br />
		<form method="post" action='todo-add-check.php' >
		タイトル<br />
		<input type="text" name= "title" style="width:250px"><br />
		内容<br />
		<textarea type="text" name="content" rows="5" cols="40"></textarea><br />
		<input type="button" onclick="history.back()" value="戻る">
		<input type="submit" value="OK">
		</form>
    </div>
</body>

</html>