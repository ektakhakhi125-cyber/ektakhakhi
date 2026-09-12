<?php

/*
CREATE TABLE playlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);


*/

$host = "localhost";
$dbname = "shop_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $keyword = $_GET["keyword"] ?? "";

    $sql = "SELECT title
            FROM playlist
            WHERE title LIKE :keyword";

    $stmt = $pdo->prepare($sql);

    $searchTerm = "%" . $keyword . "%";

    $stmt->bindValue(":keyword", $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($songs) > 0) {
        echo "<h3>Search Results:</h3>";

        foreach ($songs as $song) {
            echo htmlspecialchars($song["title"]) . "<br>";
        }
    } else {
        echo "No songs found.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
