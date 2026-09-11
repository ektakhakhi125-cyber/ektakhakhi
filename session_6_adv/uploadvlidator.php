<?php

try {

    if (!isset($_FILES['file']) || $_FILES['file']['error'] != 0) {
        throw new Exception("No file was uploaded.");
    }

    echo "File uploaded successfully!";

} catch (Exception $e) {

    echo "Upload Error: " . $e->getMessage();

} finally {

    echo "<br>Process complete.";

}

?>
