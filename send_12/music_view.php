<!DOCTYPE html>
<html>
<head>
    <title>Music Playlist</title>

    <style>
        table {
            border-collapse: collapse;
            width: 600px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eeeeee;
        }
    </style>
</head>

<body>

<h1>Music Playlist</h1>

<table>
    <tr>
        <th>Title</th>
        <th>Artist</th>
    </tr>

    <?php foreach ($songs as $song): ?>

        <tr>
            <td>
                <?php echo htmlspecialchars($song["title"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($song["artist"]); ?>
            </td>
        </tr>

    <?php endforeach; ?>

</table>

</body>
</html>
