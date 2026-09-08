<?php

header("Content-Type: application/json");

$movies = [
    [
        "id" => 1,
        "title" => "3 Idiots",
        "genre" => "Comedy"
    ],
    [
        "id" => 2,
        "title" => "Dangal",
        "genre" => "Drama"
    ],
    [
        "id" => 3,
        "title" => "Inception",
        "genre" => "Sci-Fi"
    ],
    [
        "id" => 4,
        "title" => "Avengers",
        "genre" => "Action"
    ],
    [
        "id" => 5,
        "title" => "Titanic",
        "genre" => "Romance"
    ]
];

if (isset($_GET['fail']) && $_GET['fail'] === 'true') {

    http_response_code(404);

    echo json_encode([
        "success" => false,
        "message" => "Movies not found",
        "data" => null,
        "error" => [
            "code" => 404,
            "details" => "No movies were found"
        ]
    ]);

    exit;
}

http_response_code(200);

echo json_encode([
    "success" => true,
    "message" => "Movies fetched successfully",
    "data" => $movies,
    "error" => null
]);

?>