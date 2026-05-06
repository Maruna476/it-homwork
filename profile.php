<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: register.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$cookieEmail = isset($_COOKIE['email']) ? $_COOKIE['email'] : "немає";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Профіль</title>
</head>
<body>
    <h2>Профіль</h2>
    <p>Ім'я: <?php echo $name; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Ваш email запам'ятали: <?php echo $cookieEmail; ?></p>

    <a href="logout.php">Вийти</a>
</body>
</html>