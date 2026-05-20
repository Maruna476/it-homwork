<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
}

if (isset($_POST['login']) && isset($_POST['password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login == "admin" && $password == "admin") {
        $_SESSION['user'] = $login;
    } else {
        $error = "Неправильний логін або пароль";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<?php if (isset($_SESSION['user'])) { ?>

    <h2>Привіт, <?php echo $_SESSION['user']; ?></h2>

    <p>Ваш IP: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>

    <a href="?logout=1">Вийти</a>

<?php } else { ?>

    <form method="post">

        <input type="text" name="login" placeholder="Логін">
        <br><br>

        <input type="password" name="password" placeholder="Пароль">
        <br><br>

        <button type="submit">Увійти</button>

    </form>

    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>

<?php } ?>

</body>
</html>
//https://mariavovk.infinityfreeapp.com/
