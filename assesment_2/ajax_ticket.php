<?php

include "auth.php";

$file = "data/tickets.json";

$tickets = [];

if (file_exists($file)) {

    $json = file_get_contents($file);

    $tickets = json_decode($json, true);

    if (!is_array($tickets)) {
        $tickets = [];
    }
}

$status = $_GET['status'] ?? "All";

if ($status !== "All") {

    $tickets = array_filter(
        $tickets,
        function ($ticket) use ($status) {

            return $ticket['status'] === $status;

        }
    );

}

?>

<table>

    <tr>

        <th>ID</th>

        <th>Title</th>

        <th>Status</th>

        <th>Assigned To</th>

        <th>Date</th>

    </tr>

    <?php if (count($tickets) > 0) { ?>

        <?php foreach ($tickets as $ticket) { ?>

            <tr>

                <td>
                    <?php echo $ticket['id']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($ticket['title']); ?>
                </td>

                <td>

                    <span class="status">

                        <?php echo htmlspecialchars($ticket['status']); ?>

                    </span>

                </td>

                <td>
                    <?php echo htmlspecialchars($ticket['assignedTo']); ?>
                </td>

                <td>
                    <?php echo $ticket['date']; ?>
                </td>

            </tr>

        <?php } ?>

    <?php } else { ?>

        <tr>

            <td colspan="5">
                No tickets found.
            </td>

        </tr>

    <?php } ?>

</table>