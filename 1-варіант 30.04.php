<?php
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Невалідний email";
    } elseif (strlen($message) < 20) {
        $error = "Повідомлення має містити мінімум 20 символів";
    } else {
        $success = "Повідомлення успішно надіслано";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Форма</title>
<style>
body { font-family: Arial; padding: 40px; }
form { max-width: 400px; margin: auto; display: flex; flex-direction: column; gap: 10px; }
input, textarea, button { padding: 10px; }
.error { color: red; }
.success { color: green; text-align: center; }
</style>
</head>
<body>

<form method="POST">
<input type="text" name="name" placeholder="Ім’я" required>
<input type="text" name="email" placeholder="Email" required>
<textarea name="message" placeholder="Повідомлення" required></textarea>
<button type="submit">Надіслати</button>
</form>

<div class="error"><?php echo $error; ?></div>
<div class="success"><?php echo $success; ?></div>

</body>
</html>