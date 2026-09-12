<?php

session_start();

$conn = new mysqli("localhost", "root", "", "shop_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    $sql = "SELECT id, username, password
            FROM users
            WHERE username = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            $message = "Login successful!";

        } else {
            $message = "Invalid username or password.";
        }

    } else {
        $message = "Invalid username or password.";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="POST">

    <input type="text" name="username"
           placeholder="Username" required>

    <br><br>

    <input type="password" name="password"
           placeholder="Password" required>

    <br><br>

    <button type="submit">Login</button>

</form>

</body>
</html>
