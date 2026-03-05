<?php
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {
        $_SESSION['bgColor'] = htmlspecialchars($_POST['color']);
    }
    
    $bgColor = $_SESSION['bgColor'] ?? '#ffffff';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>初めてのPHP</title>
    <style>
        body {
            transition: background-color 0.3s ease;
            margin: 20px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body style="background-color: <?php echo $bgColor; ?>">
    
    <div class="container">
        <form method="POST">
            <input type="color" name="color" value="<?php echo $bgColor; ?>">
            <button type="submit">set color</button>
        </form>
    </div>

</body>
</html>