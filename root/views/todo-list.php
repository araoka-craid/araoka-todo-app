<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>To do app</title>
</head>

<body>
<?php
require_once '../for_processing/connect.php';
$connection = new Connect();
$sql = 'SELECT id, title, content, created_at, updated_at FROM todo_list WHERE 1';
$stmt = $connection->query($sql, NULL);
?>
<main>
    <h2 style = "text-align:center; margin-bottom:0;">To Do List</h2><br/><br/>
    <form method="post" action=#>
        <table style = "margin:auto; text-align:center"  border="1">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Create</th>
                <th>Update</th>
                <th></th>
                <th></th>   
            </tr>
<?php
while (true) {
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($rec == false) {
        break;
    }
?>
    <tr>
        <td><?= $rec['title'] ?></td>
        <td><?= $rec['content'] ?></td>
        <td><?= $rec['created_at'] ?></td>
        <td><?= $rec['updated_at'] ?></td>
        <td><button>Edit</button></td>
        <td><button>Delete</button></td>
    </tr>
<?php
}
?>
</main>
</body>

</html>