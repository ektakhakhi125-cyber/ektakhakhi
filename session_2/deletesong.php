<?php

header("Content-Type: application/json");

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "DELETE") {
    http_response_code(405);

    echo json_encode([
        "success" => false,
        "message" => "Only DELETE requests are allowed"
    ]);

    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["id"])) {
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "Song ID is required"
    ]);

    exit;
}

$id = (int)$data["id"];

$stmt = $conn->prepare("DELETE FROM songs WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    if ($stmt->affected_rows > 0) {
        echo json_encode([
            "success" => true,
            "message" => "Song deleted successfully"
        ]);
    } else {
        http_response_code(404);

        echo json_encode([
            "success" => false,
            "message" => "Song not found"
        ]);
    }

} else {
    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Failed to delete song"
    ]);
}

$stmt->close();
$conn->close();
