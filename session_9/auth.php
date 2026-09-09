<?php

$validApiKey = "SMARTSTORE123";

$apiKey = $_SERVER["HTTP_X_API_KEY"] ?? "";

if ($apiKey !== $validApiKey) {

    http_response_code(401);

    header("Content-Type: application/json");

    echo json_encode([
        "success" => false,
        "message" => "Unauthorized: Invalid or missing X-API-KEY"
    ]);

    exit;
}
?>
