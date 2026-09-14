<?php
/*

Username: admin
Password: 123456


*/
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === "admin" && $password === "123456") {

        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;

    } else {

        $error = "Invalid username or password.";

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>HelpDesk Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="login-box">

    <h1>AutoFix HelpDesk</h1>

    <h2>Login</h2>

    <?php if ($error != "") { ?>

        <p class="error">
            <?php echo $error; ?>
        </p>

    <?php } ?>

    <form method="POST" onsubmit="return validateLogin()">

        <label>Username</label>

        <input
            type="text"
            id="username"
            name="username"
            placeholder="Enter username"
        >

        <label>Password</label>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter password"
        >

        <button type="submit">
            Login
        </button>

    </form>

    <p class="demo">
        Demo Login: admin / 123456
    </p>

</div>

<script src="script.js"></script>

</body>

</html>