<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uploadDir = "uploads/songs/";

    // Create directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!isset($_FILES["song"])) {
        $message = "Please select a song.";
    } elseif ($_FILES["song"]["error"] != 0) {
        $message = "Song upload failed.";
    } else {

        $fileName = basename($_FILES["song"]["name"]);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Only allow MP3
        if ($fileExtension != "mp3") {
            $message = "Only MP3 files are allowed.";
        } else {

            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file(
                $_FILES["song"]["tmp_name"],
                $targetFile
            )) {
                $message = "Song '$fileName' uploaded successfully!";
            } else {
                $message = "Unable to upload the song.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Song</title>
</head>
<body>

<h2>Upload Your Favorite Song</h2>

<?php if ($message): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

    <input type="file" name="song" accept=".mp3">

    <br><br>

    <button type="submit">Upload Song</button>

</form>

</body>
</html>
