<?php

require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header('Content-Type: application/json');

$secretKey = "MY_JWT_SECRET_KEY";

// Get Authorization header
$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

if (!$authHeader) {

    header('HTTP/1.1 401 Unauthorized');

    echo json_encode([
        "error" => "Authorization token required"
    ]);

    exit;
}

// Check Bearer token
if (strpos($authHeader, 'Bearer ') !== 0) {

    header('HTTP/1.1 401 Unauthorized');

    echo json_encode([
        "error" => "Invalid authorization format"
    ]);

    exit;
}

$token = substr($authHeader, 7);

try {

    // Decode and validate JWT
    $decoded = JWT::decode(
        $token,
        new Key($secretKey, 'HS256')
    );

    $profile = [
        "username" => "musiclover",
        "followers" => 1250,
        "posts" => 85
    ];

    echo json_encode([
        "message" => "Access granted",
        "email" => $decoded->email,
        "profile" => $profile
    ]);

} catch (Exception $e) {

    header('HTTP/1.1 401 Unauthorized');

    echo json_encode([
        "error" => "Invalid or expired token"
    ]);
}

?>