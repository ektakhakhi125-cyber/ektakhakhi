<?php
require_once "auth.php";

$tracks = [
    [
        "id" => 1,
        "name" => "Blinding Lights",
        "artist" => "The Weeknd",
        "duration" => "3:20"
    ],
    [
        "id" => 2,
        "name" => "Shape of You",
        "artist" => "Ed Sheeran",
        "duration" => "3:53"
    ],
    [
        "id" => 3,
        "name" => "Perfect",
        "artist" => "Ed Sheeran",
        "duration" => "4:23"
    ],
    [
        "id" => 4,
        "name" => "Believer",
        "artist" => "Imagine Dragons",
        "duration" => "3:24"
    ]
];

header("Content-Type: application/json");

echo json_encode([
    "success" => true,
    "tracks" => $tracks
]);
?>
