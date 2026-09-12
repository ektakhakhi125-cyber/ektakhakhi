<?php


/*
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

*/
$conn = new mysqli("localhost", "root", "", "shop_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password)
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ss",
        $username,
        $hashedPassword
    );

    if ($stmt->execute()) {
        $message = "Registration successful!";
    } else {
        $message = "Registration failed.";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>

<h2>Register</h2>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="POST">

    <input type="text" name="username"
           placeholder="Username" required>

    <br><br>

    <input type="password" name="password"
           placeholder="Password" required>

    <br><br>

    <button type="submit">Register</button>

</form>

</body>
</html>
