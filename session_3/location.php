<?php

$apiKey = "YOUR_OPENCAGE_API_KEY";

$city = "Ahmedabad";

$url = "https://api.opencagedata.com/geocode/v1/json?q="
     . urlencode($city)
     . "&key="
     . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    die("Unable to connect to the geocoding API.");
}

curl_close($ch);

$data = json_decode($response, true);

if (
    !isset($data["results"][0]["geometry"]["lat"]) ||
    !isset($data["results"][0]["geometry"]["lng"])
) {
    die("Location could not be found.");
}

$latitude = $data["results"][0]["geometry"]["lat"];
$longitude = $data["results"][0]["geometry"]["lng"];

echo "City: " . htmlspecialchars($city) . "<br>";
echo "Latitude: " . $latitude . "<br>";
echo "Longitude: " . $longitude;
?>
