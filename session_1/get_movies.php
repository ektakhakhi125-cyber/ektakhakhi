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

echo json_encode($movies);
?>

