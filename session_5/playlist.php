<?php

header('Content-Type: application/json');

// Get Authorization header
$auth = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

if (!$auth) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode([
        "error" => "Authorization header required"
    ]);
    exit;
}

// Check Basic Auth
if (strpos($auth, 'Basic ') === 0) {

    $encoded = substr($auth, 6);
    $decoded = base64_decode($encoded);

    list($username, $password) = explode(':', $decoded, 2);

    if ($username === 'musicfan' && $password === 'topstraining') {

        $playlists = [
            [
                "id" => 1,
                "name" => "Chill Vibes",
                "description" => "Relaxing songs for your day",
                "songs" => 25
            ],
            [
                "id" => 2,
                "name" => "Workout Hits",
                "description" => "Energetic songs for workouts",
                "songs" => 30
            ],
            [
                "id" => 3,
                "name" => "Bollywood Favorites",
                "description" => "Popular Bollywood songs",
                "songs" => 20
            ]
        ];

        echo json_encode($playlists);
        exit;
    }
}

header('HTTP/1.1 401 Unauthorized');

echo json_encode([
    "error" => "Invalid username or password"
]);

?>