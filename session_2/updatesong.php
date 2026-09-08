{
    "id": 1,
    "title": "Blinding Lights - Remix",
    "duration": 210
}
<?php

header("Content-Type: application/json");

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "PUT") {
    http_response_code(405);

    echo json_encode([
        "success" => false,
        "message" => "Only PUT requests are allowed"
    ]);

    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (
    !isset($data["id"]) ||
    !isset($data["title"]) ||
    !isset($data["duration"])
) {
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "ID, title, and duration are required"
    ]);

    exit;
}

$id = (int)$data["id"];
$title = $data["title"];
$duration = (int)$data["duration"];

$stmt = $conn->prepare(
    "UPDATE songs SET title = ?, duration = ? WHERE id = ?"
);

$stmt->bind_param("sii", $title, $duration, $id);

if ($stmt->execute()) {

    if ($stmt->affected_rows > 0) {
        echo json_encode([
            "success" => true,
            "message" => "Song updated successfully"
        ]);
    } else {
        http_response_code(404);

        echo json_encode([
            "success" => false,
            "message" => "Song not found or no changes made"
        ]);
    }

} else {
    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Failed to update song"
    ]);
}

$stmt->close();
$conn->close();
