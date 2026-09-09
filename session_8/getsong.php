<?php

header("Content-Type: application/json");

// --------------------------------------------------
// 1. HTTPS CHECK
// --------------------------------------------------

if (
    !isset($_SERVER['HTTPS']) ||
    $_SERVER['HTTPS'] !== 'on'
) {

    http_response_code(403);

    echo json_encode([
        "error" => "HTTPS connection is required."
    ]);

    exit;
}


// --------------------------------------------------
// 2. GENRE PARAMETER CHECK
// --------------------------------------------------

if (!isset($_GET['genre']) || empty($_GET['genre'])) {

    http_response_code(400);

    echo json_encode([
        "error" => "The 'genre' parameter is required."
    ]);

    exit;
}

$genre = $_GET['genre'];


// --------------------------------------------------
// 3. RATE LIMITING
// Maximum 3 requests per IP in 1 minute
// --------------------------------------------------

$ip = $_SERVER['REMOTE_ADDR'];

$rate_file = sys_get_temp_dir() . "/api_rate_" . md5($ip) . ".txt";

$current_time = time();

$requests = [];


// Read existing requests
if (file_exists($rate_file)) {

    $data = file_get_contents($rate_file);

    $requests = json_decode($data, true);

    if (!is_array($requests)) {
        $requests = [];
    }
}


// Keep only requests from the last 60 seconds
$requests = array_filter(
    $requests,
    function ($time) use ($current_time) {
        return ($current_time - $time) < 60;
    }
);


// Check limit
if (count($requests) >= 3) {

    http_response_code(429);

    echo json_encode([
        "error" => "Too many requests. Please try again later."
    ]);

    exit;
}


// Add current request
$requests[] = $current_time;


// Save request information
file_put_contents(
    $rate_file,
    json_encode(array_values($requests))
);


// --------------------------------------------------
// 4. SUCCESS RESPONSE
// --------------------------------------------------

$songs = [
    "Blinding Lights",
    "Shape of You",
    "As It Was",
    "Flowers",
    "Stay"
];

http_response_code(200);

echo json_encode([
    "genre" => $genre,
    "songs" => $songs
]);

?>
