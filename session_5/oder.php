<?php

header('Content-Type: application/json');

$apiKey = $_GET['api_key'] ?? '';

if ($apiKey !== 'MYSECRET123') {

    header('HTTP/1.1 401 Unauthorized');

    echo json_encode([
        "error" => "Invalid API key"
    ]);

    exit;
}

$orders = [
    [
        "order_id" => 101,
        "restaurant" => "Food Palace",
        "item" => "Veg Pizza",
        "price" => 299,
        "status" => "Delivered"
    ],
    [
        "order_id" => 102,
        "restaurant" => "Spice Kitchen",
        "item" => "Paneer Biryani",
        "price" => 249,
        "status" => "Preparing"
    ],
    [
        "order_id" => 103,
        "restaurant" => "Burger House",
        "item" => "Cheese Burger",
        "price" => 199,
        "status" => "Out for Delivery"
    ]
];

echo json_encode($orders);

?>