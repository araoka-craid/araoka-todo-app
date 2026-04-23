<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>To do app</title>
</head>

<body>
<main>
    <div class="container" style = "margin:auto;width:90%;">
        <h2 style = "text-align:center; margin-bottom:0;">To Do List</h2><br/>
        <div class = "box" style="display: flex; justify-content: flex-end; margin-bottom:5px;">
            <button><a href="/add" style="color:black; text-decoration:none;">To add tasks</a></button>
        </div>
        <form method="post" action=#>
            <table style = "margin:auto; text-align:center; width:100%;"  border="1">
                <tr>
                    <th>Title</th>
                    <th> Content</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th></th>
                    <th></th>   
                </tr>

    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= h($task['title'])?></td>
            <td><?= h($task['content'])?></td>
            <td><?= h($task['created_at']) ?></td>
            <td><?= h($task['updated_at']) ?></td>
            <td><button><a style = "text-decoration:none;color:black;" href="/edit/<?= h($task['id']) ?>">Edit</a></button></td>
            <td><button><a style = "text-decoration:none;color:black;" href="/delete/<?= h($task['id']) ?>&action=delete">Delete</a></button></td>
        </tr>
    <?php endforeach; ?>
        </table>
    </div>   
</main>
</body>

</html>