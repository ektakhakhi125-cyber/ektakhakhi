<?php

session_start();

// Generate CSRF token if one doesn't already exist
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $token = $_POST["csrf_token"] ?? "";

    if (!hash_equals($_SESSION["csrf_token"], $token)) {
        $message = "Error: Invalid CSRF token!";
    } else {
        $message = "Form submitted successfully!";

        // Optional: Generate a new token after successful submission
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>CSRF Protection</title>
</head>
<body>

<h2>Secure Form</h2>

<?php if ($message !== ""): ?>
    <p>
        <?php echo htmlspecialchars($message); ?>
    </p>
<?php endif; ?>

<form method="POST">

    <input
        type="hidden"
        name="csrf_token"
        value="<?php echo htmlspecialchars($_SESSION["csrf_token"]); ?>"
    >

    <label>Name:</label>
    <input type="text" name="name" required>

    <br><br>

    <button type="submit">Submit</button>

</form>

</body>
</html>
