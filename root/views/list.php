<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>To do app</title>
</head>

<body>
<?php
//データベースとの接続
require_once '../models/connect.php';
$connection = new Connect();

//テーブルからデータの取得準備
$sql = 'SELECT id, title, content, created_at, updated_at FROM todo_list WHERE 1 ORDER BY created_at desc';
$stmt = $connection->query($sql, null);

?>
<main>
    <div class="container" style = "margin:auto;width:90%;">
        <h2 style = "text-align:center; margin-bottom:0;">To Do List</h2><br/>
        <div class = "box" style="display: flex; justify-content: flex-end; margin-bottom:5px;">
            <button><a href="./add.php" style="color:black; text-decoration:none;">To add tasks</a></button>
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
    <?php
    while (true) {
        //データの取得
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($rec);
        if ($rec == false) {
            break;
        }
        ?>
        <tr>
            <td><?= $rec['title'] ?></td>
            <td><?= $rec['content'] ?></td>
            <td><?= $rec['created_at'] ?></td>
            <td><?= $rec['updated_at'] ?></td>
            <td><button><a style = "text-decoration:none;color:black;" href="edit.php?id=<?= $rec['id'] ?>">Edit</a></button></td>
            <td><button><a style = "text-decoration:none;color:black;" href="delete.php?id=<?= $rec['id'] ?>">Delete</a></button></td>
        </tr>
    <?php
    }
?>
        </table>
            <a href="../index.php" style="text-decoration:none;">Back to the menu</a>
    </div>   
</main>
</body>

</html>