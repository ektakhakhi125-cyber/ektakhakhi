<?php

$username = "";
$email = "";

$usernameError = "";
$emailError = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    // Username validation
    if ($username == "") {
        $usernameError = "Username is required.";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid email address.";
    }

    // Only show success if there are no errors
    if ($usernameError == "" && $emailError == "") {
        $success = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>

<h2>Create Account</h2>

<?php if ($success): ?>
    <p style="color:green;">
        <?php echo htmlspecialchars($success); ?>
    </p>
<?php endif; ?>

<form method="POST">

    <label>Username:</label><br>

    <input
        type="text"
        name="username"
        value="<?php echo htmlspecialchars($username); ?>"
    >

    <?php if ($usernameError): ?>
        <span style="color:red;">
            <?php echo $usernameError; ?>
        </span>
    <?php endif; ?>

    <br><br>


    <label>Email:</label><br>

    <input
        type="text"
        name="email"
        value="<?php echo htmlspecialchars($email); ?>"
    >

    <?php if ($emailError): ?>
        <span style="color:red;">
            <?php echo $emailError; ?>
        </span>
    <?php endif; ?>

    <br><br>


    <label>Password:</label><br>

    <input
        type="password"
        name="password"
        value=""
    >

    <br><br>

    <button type="submit">Register</button>

</form>

</body>
</html>
