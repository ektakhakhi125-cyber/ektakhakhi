<?php

require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;

header('Content-Type: application/json');

// Hardcoded user
$validEmail = "user@gmail.com";
$validPassword = "123456";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email !== $validEmail || $password !== $validPassword) {

    header('HTTP/1.1 401 Unauthorized');

    echo json_encode([
        "error" => "Invalid email or password"
    ]);

    exit;
}

// Secret key
$secretKey = "MY_JWT_SECRET_KEY";

// Token data
$payload = [
    "iss" => "my-php-api",
    "iat" => time(),
    "exp" => time() + 3600,
    "email" => $email
];

// Generate JWT
$jwt = JWT::encode($payload, $secretKey, 'HS256');

echo json_encode([
    "message" => "Login successful",
    "token" => $jwt
]);

?>