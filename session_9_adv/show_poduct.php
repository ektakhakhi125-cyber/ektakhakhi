<?php

// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "my_database");

// Check database connection
if (mysqli_connect_errno()) {
    die("Database connection failed. Please try again later.");
}

// Execute query
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Check query
if (!$result) {
    die("Unable to load products. Please try again later.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h1>Product List</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['price']); ?></td>
        </tr>
    <?php
    }
    ?>

</table>

</body>
</html>

<?php
mysqli_close($conn);
?>
