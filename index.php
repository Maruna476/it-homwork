<?php

#[Attribute]
class OnlyAdults {}

$users = [
    ["name" => "Ivan", "age" => 20, "email" => "ivan@example.com"],
    ["name" => "Olena", "age" => 17, "email" => "olena@example.com"],
    ["name" => "Petro", "age" => 25, "email" => "petro@example.com"],
    ["name" => "Anna", "age" => 19, "email" => "anna@example.com"],
    ["name" => "Mykola", "age" => 16, "email" => "mykola@example.com"],
    ["name" => "Svitlana", "age" => 30, "email" => "svitlana@example.com"],
    ["name" => "Oleg", "age" => 22, "email" => "oleg@example.com"],
    ["name" => "Iryna", "age" => 18, "email" => "iryna@example.com"],
    ["name" => "Vasyl", "age" => 15, "email" => "vasyl@example.com"],
    ["name" => "Kateryna", "age" => 27, "email" => "kateryna@example.com"],
];

#[OnlyAdults]
function filterAdults(array $users): array {
    return array_values(array_filter($users, fn($u) => $u["age"] >= 18));
}

function callWithLogging(string $fn, array $args) {
    $ref = new ReflectionFunction($fn);
    if ($ref->getAttributes(OnlyAdults::class)) {
        echo "<p>[LOG] {$fn}</p>";
    }
    return $ref->invokeArgs($args);
}

function compareByNameLength($a, $b) {
    return strlen($a["name"]) <=> strlen($b["name"]);
}

$adults = callWithLogging("filterAdults", [$users]);
usort($adults, "compareByNameLength");

echo "<table border='1'>";
echo "<thead><tr><th>Name</th><th>Age</th><th>Email</th></tr></thead>";
echo "<tbody>";

foreach ($adults as $u) {
    echo "<tr>
            <td>{$u["name"]}</td>
            <td>{$u["age"]}</td>
            <td>{$u["email"]}</td>
          </tr>";
}

echo "</tbody></table>";