<?php

$conn = new mysqli("localhost", "root", "", "shop_db");

$search = $_GET["search"];

$sql = "SELECT * FROM products WHERE name LIKE '%" . $search . "%'";

$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo htmlspecialchars($row["name"]) . "<br>";
    }
}

$conn->close();

?>
