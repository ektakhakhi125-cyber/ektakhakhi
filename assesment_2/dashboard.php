<?php

include "auth.php";

?>

<!DOCTYPE html>
<html>

<head>

    <title>HelpDesk Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

    <h2>AutoFix HelpDesk</h2>

    <div>

        Welcome,
        <strong>
            <?php echo htmlspecialchars($_SESSION['username']); ?>
        </strong>

        &nbsp; | &nbsp;

        <a href="logout.php">
            Logout
        </a>

    </div>

</div>

<div class="dashboard">

    <h1>HelpDesk Dashboard</h1>

    <p>
        Manage customer support tickets.
    </p>

    <div class="cards">

        <div class="card">

            <h2>➕</h2>

            <h3>Create Ticket</h3>

            <p>Create a new support ticket.</p>

            <a href="add_ticket.php">
                Add Ticket
            </a>

        </div>


        <div class="card">

            <h2>📋</h2>

            <h3>View Tickets</h3>

            <p>View open and closed tickets.</p>

            <a href="tickets.php">
                View Tickets
            </a>

        </div>

    </div>

</div>

</body>

</html>