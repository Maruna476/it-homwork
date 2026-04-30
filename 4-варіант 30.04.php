<?php
function clean($data) {
    return htmlspecialchars(trim($data));
}

$error = "";
$result = "";

$prices = [
    "Товар 1" => 100,
    "Товар 2" => 200,
    "Товар 3" => 300
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clean($_POST["name"]);
    $email = clean($_POST["email"]);
    $product = clean($_POST["product"]);
    $quantity = clean($_POST["quantity"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Невалідний email";
    } elseif (!is_numeric($quantity) || $quantity < 1 || $quantity > 100) {
        $error = "Кількість має бути від 1 до 100";
    } else {
        $price = $prices[$product];
        $total = $price * $quantity;

        $result = "Покупець: $name<br>
        Email: $email<br>
        Товар: $product<br>
        Кількість: $quantity<br>
        Сума: $total грн";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Замовлення</title>
<style>
body { font-family: Arial; padding: 40px; }
form { max-width: 400px; margin: auto; display: flex; flex-direction: column; gap: 10px; }
input, select, button { padding: 10px; }
.error { color: red; }
.result { color: green; margin-top: 20px; }
</style>
</head>
<body>

<form method="POST">
<input type="text" name="name" placeholder="Ім’я покупця" required>
<input type="text" name="email" placeholder="Email" required>

<select name="product">
<option>Товар 1</option>
<option>Товар 2</option>
<option>Товар 3</option>
</select>

<input type="number" name="quantity" placeholder="Кількість" required>
<button type="submit">Замовити</button>
</form>

<div class="error"><?php echo $error; ?></div>
<div class="result"><?php echo $result; ?></div>

</body>
</html>