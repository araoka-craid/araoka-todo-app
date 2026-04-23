<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>To do app</title>
</head>

<body>

 <main>
    <div class="container" style="margin:auto; width:300px;">
         <h2 style = "text-align:center; margin-bottom:0;">Edit</h2><br/>
         <form method="post" action="/edit">
            <label for="title">Title</label><br>
			    <input type="text" name= "title" style="width:250px" value="<?= h($data['title']) ?>" required><br />
			<label for="content">Content</label><br>
			    <textarea type="text" name="content" rows="5" cols="40" required><?= h($data['content']) ?></textarea><br />
            <input type="hidden" name="id" value="<?= h($data['id']) ?>">
			<input type="button" onclick="history.back()" value="Cancel">
			<input type="submit" value="OK">
         </form>
    </div>
 <main>

</body>

</html>