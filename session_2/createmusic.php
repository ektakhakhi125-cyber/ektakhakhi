{
    "title": "Blinding Lights",
    "artist": "The Weeknd",
    "duration": 200
}
<?php

header("Content-Type: application/json");

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "message" => "Only POST requests are allowed"
    ]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (
    !isset($data["title"]) ||
    !isset($data["artist"]) ||
    !isset($data["duration"])
) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Title, artist, and duration are required"
    ]);
    exit;
}

$title = $data["title"];
$artist = $data["artist"];
$duration = (int)$data["duration"];

$stmt = $conn->prepare(
    "INSERT INTO music (	title, artist, duration) VALUES (?, ?, ?)"
);

$stmt->bind_param("ssi", $title, $artist, $duration);

if ($stmt->execute()) {
    http_response_code(201);

    echo json_encode([
        "success" => true,
        "message" => "Song created successfully",
        "id" => $stmt->insert_id
    ]);
} else {
    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Failed to create song"
    ]);
}

$stmt->close();
$conn->close();
