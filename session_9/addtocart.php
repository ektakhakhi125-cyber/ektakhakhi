<?php
require_once "auth.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);

    echo json_encode([
        "success" => false,
        "message" => "Only POST requests are allowed"
    ]);

    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["product_id"]) || !isset($data["quantity"])) {
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "product_id and quantity are required"
    ]);

    exit;
}

$productId = (int)$data["product_id"];
$quantity = (int)$data["quantity"];

if ($productId <= 0 || $quantity <= 0) {
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "Invalid product_id or quantity"
    ]);

    exit;
}

$file = "cart.json";

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$cart = json_decode(file_get_contents($file), true);

$cart[] = [
    "product_id" => $productId,
    "quantity" => $quantity
];

file_put_contents($file, json_encode($cart, JSON_PRETTY_PRINT));

echo json_encode([
    "success" => true,
    "message" => "Product added to cart successfully",
    "item" => [
        "product_id" => $productId,
        "quantity" => $quantity
    ]
]);
?>
