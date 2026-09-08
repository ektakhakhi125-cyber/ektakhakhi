<?php

$geoApiKey = "YOUR_OPENCAGE_API_KEY";
$googleApiKey = "YOUR_GOOGLE_MAPS_API_KEY";

$city = "Ahmedabad";

$url = "https://api.opencagedata.com/geocode/v1/json?q="
     . urlencode($city)
     . "&key="
     . $geoApiKey;

$response = file_get_contents($url);

if ($response === false) {
    die("Unable to find the city.");
}

$data = json_decode($response, true);

if (
    !isset($data["results"][0]["geometry"]["lat"]) ||
    !isset($data["results"][0]["geometry"]["lng"])
) {
    die("City not found.");
}

$lat = $data["results"][0]["geometry"]["lat"];
$lng = $data["results"][0]["geometry"]["lng"];

$mapUrl = "https://maps.googleapis.com/maps/api/staticmap?"
        . "center=$lat,$lng"
        . "&zoom=12"
        . "&size=600x400"
        . "&markers=color:red%7C$lat,$lng"
        . "&key=$googleApiKey";

echo "<h1>Map of " . htmlspecialchars($city) . "</h1>";

echo "<img src=\"" . htmlspecialchars($mapUrl) . "\" alt=\"Map\">";
?>
