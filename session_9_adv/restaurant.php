<?php

$conn = mysqli_connect("localhost", "root", "", "my_database");

if (mysqli_connect_errno()) {
    die("Database connection failed. Please try again later.");
}

$sql = "SELECT name, cuisine FROM restaurants";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Unable to load restaurants. Please try again later.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurants</title>
</head>
<body>

<h1>Restaurant List</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Restaurant Name</th>
        <th>Cuisine</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td>
                <?php echo htmlspecialchars($row['name']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['cuisine']); ?>
            </td>
        </tr>

    <?php } ?>

</table>

</body>
</html>

<?php
mysqli_close($conn);
?>
