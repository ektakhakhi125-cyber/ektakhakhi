<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uploadDir = "uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!isset($_FILES["file"])) {

        $message = "Please select an image.";

    } elseif ($_FILES["file"]["error"] != 0) {

        $message = "Image upload failed.";

    } else {

        $fileName = basename($_FILES["file"]["name"]);
        $fileType = $_FILES["file"]["type"];
        $fileSize = $_FILES["file"]["size"];

        // Maximum size = 2MB
        $maxSize = 2 * 1024 * 1024;

        // Allowed MIME types
        $allowedTypes = [
            "image/jpeg",
            "image/png"
        ];

        // Get extension
        $extension = strtolower(
            pathinfo($fileName, PATHINFO_EXTENSION)
        );

        $allowedExtensions = ["jpg", "jpeg", "png"];

        if (!in_array($fileType, $allowedTypes)) {

            $message = "Only JPG, JPEG and PNG images are allowed.";

        } elseif (!in_array($extension, $allowedExtensions)) {

            $message = "Invalid image extension.";

        } elseif ($fileSize > $maxSize) {

            $message = "Image must be under 2MB.";

        } else {

            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file(
                $_FILES["file"]["tmp_name"],
                $targetFile
            )) {
                $message = "Profile background uploaded successfully!";
            } else {
                $message = "Unable to upload image.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Background</title>
</head>
<body>

<h2>Upload Profile Background</h2>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="POST" enctype="multipart/form-data">

    <input
        type="file"
        name="file"
        accept=".jpg,.jpeg,.png"
    >

    <br><br>

    <button type="submit">Upload Background</button>

</form>

</body>
</html>
