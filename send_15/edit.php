<!DOCTYPE html>
<html>
<head>
    <title>Edit Playlist</title>
</head>

<body>

<h1>Edit Playlist</h1>

<form action="index.php?action=update" method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= htmlspecialchars($playlist['id']) ?>"
    >

    <label>Playlist Name:</label>
    <br>

    <input
        type="text"
        name="name"
        value="<?= htmlspecialchars($playlist['name']) ?>"
        required
    >

    <br><br>

    <label>Description:</label>
    <br>

    <textarea
        name="description"
        required
    ><?= htmlspecialchars($playlist['description']) ?></textarea>

    <br><br>

    <button type="submit">
        Update Playlist
    </button>

</form>

<br>

<a href="index.php">
    Back to Playlist
</a>

</body>
</html>