<?php

$playlistName = "";
$email = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $playlistName = trim($_POST["playlist_name"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($playlistName == "") {
        $error = "Please enter a playlist name.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        $success = "Playlist '$playlistName' created successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Playlist</title>
</head>
<body>

<h2>Add Playlist</h2>

<?php if ($error != ""): ?>
    <p style="color:red;">
        <?php echo htmlspecialchars($error); ?>
    </p>
<?php endif; ?>

<?php if ($success != ""): ?>
    <p style="color:green;">
        <?php echo htmlspecialchars($success); ?>
    </p>
<?php endif; ?>

<form method="POST">

    <label>Playlist Name:</label><br>
    <input
        type="text"
        name="playlist_name"
        value="<?php echo htmlspecialchars($playlistName); ?>"
    >

    <br><br>

    <label>Email:</label><br>
    <input
        type="text"
        name="email"
        value="<?php echo htmlspecialchars($email); ?>"
    >

    <br><br>

    <button type="submit">Create Playlist</button>

</form>

</body>
</html>
