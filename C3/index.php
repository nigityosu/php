<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $users = [
        ["ID"=> "1","name"=> "John Doe","email"=> "john@example.com"],
        ["ID"=> "2","name"=> "Jane smith","email"=> "jane@example.com"],
        ["ID"=> "3","name"=> "Peter Jones","email"=> "peter@example.com"],
    ];
    ?>
    <table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メール</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['ID']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>