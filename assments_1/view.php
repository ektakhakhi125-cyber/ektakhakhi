<?php

include "db.php";

$sql = "SELECT * FROM customer_interactions ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Records</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="table-container">

    <h1>TechEdge Motors</h1>

    <h2>Customer Interaction Records</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Vehicle</th>
            <th>Complaint</th>
            <th>Date</th>
        </tr>

        <?php

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

        ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo htmlspecialchars($row['name']); ?></td>

            <td><?php echo htmlspecialchars($row['phone']); ?></td>

            <td><?php echo htmlspecialchars($row['email']); ?></td>

            <td><?php echo htmlspecialchars($row['vehicle']); ?></td>

            <td><?php echo htmlspecialchars($row['complaint']); ?></td>

            <td><?php echo $row['created_at']; ?></td>

        </tr>

        <?php

            }

        } else {

            echo "<tr>
                    <td colspan='7'>No customer records found.</td>
                  </tr>";
        }

        ?>

    </table>

    <br>

    <a href="index.php" class="view-link">
        Add New Customer
    </a>

</div>

</body>

</html>