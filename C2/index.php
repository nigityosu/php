<?php
session_start();
if (!isset($_SESSION["lgin"])) {
    $_SESSION["lgin"] = "f";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
if (isset($_POST['incloud'])) {
    if ($_POST['incloud'] === "password123") {
        $_SESSION["lgin"] = "t";
    }
};
if (isset($_GET["out"])) {
    session_destroy();
}
?>

<body>
    <?php if ($_SESSION["lgin"] === "f"): ?>
        <form action="" method="post">
            <div>passeord:</div>
            <input type="text" name="incloud">
            <button>sign in</button>
        </form>
    <?php else: ?>
        <form method="get">
            <h1>Welcome!</h1>
            <input type="hidden"  name="out">
            <button>log out</button>
            <?php ?>
        </form>
    <?php endif ?>
</body>

</html>