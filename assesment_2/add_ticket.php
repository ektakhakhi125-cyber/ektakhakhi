<?php

include "auth.php";
include "Ticket.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST['title']);
    $status = $_POST['status'];
    $assignedTo = trim($_POST['assignedTo']);

    if (
        !empty($title) &&
        !empty($status) &&
        !empty($assignedTo)
    ) {

        $file = "data/tickets.json";

        $tickets = [];

        if (file_exists($file)) {

            $json = file_get_contents($file);

            $tickets = json_decode($json, true);

            if (!is_array($tickets)) {
                $tickets = [];
            }
        }

        $id = count($tickets) + 1;

        $date = date("Y-m-d H:i:s");

        $ticket = new Ticket(
            $id,
            $title,
            $status,
            $assignedTo,
            $date
        );

        $tickets[] = $ticket->toArray();

        file_put_contents(
            $file,
            json_encode($tickets, JSON_PRETTY_PRINT)
        );

        $message = "Ticket created successfully.";

    } else {

        $message = "All fields are required.";

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Ticket</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

    <h2>AutoFix HelpDesk</h2>

    <a href="dashboard.php">
        Dashboard
    </a>

</div>

<div class="form-container">

    <h1>Create New Ticket</h1>

    <?php if ($message != "") { ?>

        <p class="success">
            <?php echo $message; ?>
        </p>

    <?php } ?>

    <form
        method="POST"
        onsubmit="return validateTicket()"
    >

        <label>Ticket Title</label>

        <input
            type="text"
            id="title"
            name="title"
            placeholder="Enter ticket title"
        >

        <label>Status</label>

        <select id="status" name="status">

            <option value="">Select Status</option>

            <option value="Open">
                Open
            </option>

            <option value="Closed">
                Closed
            </option>

        </select>

        <label>Assigned To</label>

        <input
            type="text"
            id="assignedTo"
            name="assignedTo"
            placeholder="Enter employee name"
        >

        <button type="submit">
            Create Ticket
        </button>

    </form>

</div>

<script src="script.js"></script>

</body>

</html>