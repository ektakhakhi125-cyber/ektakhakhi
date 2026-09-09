<?php

header("Content-Type: application/json");

require_once "config.php";

// Get JSON data from frontend
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["amount"])) {

    echo json_encode([
        "error" => "Amount is required"
    ]);

    exit;
}

$amount = floatval($data["amount"]);

if ($amount <= 0) {

    echo json_encode([
        "error" => "Invalid amount"
    ]);

    exit;
}

// Convert rupees to paise
$amount_paise = round($amount * 100);

// Razorpay order data
$order_data = [

    "amount" => $amount_paise,

    "currency" => "INR",

    "receipt" => "receipt_" . time()

];

// Create cURL request
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order_data));

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

// Razorpay Basic Authentication
curl_setopt($ch, CURLOPT_USERPWD, $key_id . ":" . $key_secret);

$response = curl_exec($ch);

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

// Convert response to array
$result = json_decode($response, true);

// Check for error
if ($http_code >= 400) {

    echo json_encode([
        "error" => $result["error"]["description"] ?? "Razorpay API error"
    ]);

    exit;
}

// Return order information to frontend
echo json_encode([
    "key_id" => $key_id,
    "order_id" => $result["id"],
    "amount" => $result["amount"],
    "currency" => $result["currency"]
]);

?>
