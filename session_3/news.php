<?php

$apiKey = "YOUR_API_KEY";

$url = "https://newsapi.org/v2/top-headlines?country=in&apiKey=" . $apiKey;

$response = file_get_contents($url);

if ($response === false) {
    die("Unable to fetch news.");
}

$data = json_decode($response, true);

if (!isset($data["articles"])) {
    die("Invalid news data received.");
}

echo "<h1>Top Indian Headlines</h1>";

$count = 0;

foreach ($data["articles"] as $article) {

    if ($count >= 5) {
        break;
    }

    echo "<h3>" . htmlspecialchars($article["title"]) . "</h3>";

    $count++;
}
?>
