<?php

$comment = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment = $_POST["comment"] ?? "";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Comments</title>
</head>
<body>

<h2>Leave a Comment</h2>

<form method="POST">
    <textarea name="comment" rows="5" cols="40"
              placeholder="Enter your comment" required></textarea>
    <br><br>

    <button type="submit">Submit Comment</button>
</form>

<?php if ($comment !== ""): ?>

    <h3>Your Comment:</h3>

    <p>
        <?php echo htmlspecialchars($comment, ENT_QUOTES, "UTF-8"); ?>
    </p>

<?php endif; ?>

</body>
</html>
