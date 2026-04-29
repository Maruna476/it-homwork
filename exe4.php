<?php

#[Attribute]
class LogTransactionType {
    public function __construct(public string $type) {}
}

$transactions = [
    ["amount" => 100, "type" => "in", "date" => "2024-01-01"],
    ["amount" => 50,  "type" => "out", "date" => "2024-01-02"],
    ["amount" => 200, "type" => "in", "date" => "2024-01-03"],
    ["amount" => 70,  "type" => "out", "date" => "2024-01-04"],
    ["amount" => 30,  "type" => "out", "date" => "2024-01-05"],
    ["amount" => 150, "type" => "in", "date" => "2024-01-06"],
    ["amount" => 90,  "type" => "out", "date" => "2024-01-07"],
];

#[LogTransactionType(type: "out")]
function isOutgoing(array $t): bool {
    return $t["type"] === "out";
}

function calculateTotal(array $transactions, callable $filter): float {
    return array_reduce(
        array_filter($transactions, $filter),
        fn($sum, $t) => $sum + $t["amount"],
        0
    );
}

function callWithLogging(callable $fn, array $transactions): array {
    $ref = new ReflectionFunction($fn);
    $attrs = $ref->getAttributes(LogTransactionType::class);

    if ($attrs) {
        $type = $attrs[0]->newInstance()->type;
        echo "<p>[LOG] {$type} " . date("Y-m-d H:i:s") . "</p>";
    }

    return array_filter($transactions, $fn);
}

$outgoing = callWithLogging("isOutgoing", $transactions);
$total = calculateTotal($transactions, "isOutgoing");

echo "<table border='1'>";
echo "<tr><th>Total outgoing</th></tr>";
echo "<tr><td>{$total}</td></tr>";
echo "</table>";