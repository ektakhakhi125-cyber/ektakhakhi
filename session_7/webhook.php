<?php

// Get Razorpay webhook request
$payload = file_get_contents("php://input");

// Convert JSON to PHP array
$data = json_decode($payload, true);

// Check event
if (
    isset($data["event"]) &&
    $data["event"] === "payment.captured"
) {

    $payment = $data["payload"]["payment"]["entity"];

    $payment_id = $payment["id"];
    $amount = $payment["amount"];
    $status = $payment["status"];

    // Convert paise to rupees
    $amount_rupees = $amount / 100;

    // Data to save
    $log = "Payment ID: " . $payment_id .
           " | Amount: ₹" . $amount_rupees .
           " | Status: " . $status .
           " | Time: " . date("Y-m-d H:i:s") .
           PHP_EOL;

    // Append to payments.txt
    file_put_contents(
        "payments.txt",
        $log,
        FILE_APPEND
    );
}

// Tell Razorpay that webhook was received
http_response_code(200);

echo "Webhook received";

?>
