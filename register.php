<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    if ($name && $email && $password) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        setcookie("email", $email, time() + (7 * 24 * 60 * 60), "/");

        header("Location: profile.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Реєстрація</title>
</head>
<body>
    <h2>Реєстрація</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Ім'я" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Пароль" required><br><br>
        <button type="submit">Зареєструватися</button>
    </form>
</body>
</html>