<?php

$uploadDir = "uploads/songs/";

if (!is_dir($uploadDir)) {
    echo "Songs directory does not exist.";
    exit;
}

$files = scandir($uploadDir);

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Songs</title>
</head>
<body>

<h2>Uploaded Songs</h2>

<?php

$found = false;

foreach ($files as $file) {

    // Ignore . and ..
    if ($file == "." || $file == "..") {
        continue;
    }

    $extension = strtolower(
        pathinfo($file, PATHINFO_EXTENSION)
    );

    // Only show MP3 files
    if ($extension == "mp3") {

        $found = true;

        $fileUrl = $uploadDir . rawurlencode($file);

        echo "<h3>" . htmlspecialchars($file) . "</h3>";

        echo "<audio controls>";
        echo "<source src='" . htmlspecialchars($fileUrl) . "' type='audio/mpeg'>";
        echo "Your browser does not support audio playback.";
        echo "</audio>";

        echo "<br><br>";
    }
}

if (!$found) {
    echo "<p>No songs uploaded yet.</p>";
}

?>

</body>
</html>
