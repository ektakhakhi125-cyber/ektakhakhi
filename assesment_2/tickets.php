<?php

include "auth.php";

?>

<!DOCTYPE html>
<html>

<head>

    <title>Tickets</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

    <h2>AutoFix HelpDesk</h2>

    <div>

        <a href="dashboard.php">
            Dashboard
        </a>

        &nbsp; | &nbsp;

        <a href="logout.php">
            Logout
        </a>

    </div>

</div>

<div class="ticket-container">

    <h1>Support Tickets</h1>

    <div class="filters">

        <button onclick="loadTickets('All')">
            All
        </button>

        <button onclick="loadTickets('Open')">
            Open
        </button>

        <button onclick="loadTickets('Closed')">
            Closed
        </button>

    </div>

    <div id="ticketData">

        Loading tickets...

    </div>

</div>

<script src="script.js"></script>

<script>

loadTickets("All");

</script>

</body>

</html>