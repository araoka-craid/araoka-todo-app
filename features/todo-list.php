<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>To do app</title>
</head>

<body>
<?php
require_once 'connect.php';
$connection = new Connect();
$sql = 'SELECT id, title, content, created_at, updated_at FROM todo_list WHERE 1';
$stmt = $connection->query($sql, NULL);

print '<h2 style = "text-align:center; margin-bottom:0;">To Do List</h2><br/><br/>';
print '<form method="post" action=#>';
print '<table style = "margin:auto; text-align:center;"  border="1">';
print '<tr>';
print '<th>タイトル</th>';
print '<th>内容</th>';
print '<th>作成日時</th>';
print '<th>更新日時</th>';
print '<th></th>';
print '<th></th>';
print '</tr>';

while (true) {
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($rec == false) {
        break;
    }
    print '<tr>';
    print '<td>' . $rec['title'] . '</td>';
    print '<td>' . $rec['content'] . '</td>';
    print '<td>' . $rec['created_at'] . '</td>';
    print '<td>' . $rec['updated_at'] . '</td>';
    print '<td><button onclick="location.href=#">編集</button></td>';
    print '<td><button onclick="location.href=#">削除</button></td>';
    print '</tr>';
}
?>
</body>

</html>