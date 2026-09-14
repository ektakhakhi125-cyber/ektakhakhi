<?php

require_once __DIR__ . '/controllers/PlaylistController.php';

$controller = new PlaylistController();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    case 'edit':
        $id = $_GET['id'] ?? 0;
        $controller->edit($id);
        break;

    case 'update':
        $controller->update();
        break;

    case 'delete':
        $id = $_GET['id'] ?? 0;
        $controller->delete($id);
        break;

    default:
        $controller->index();
        break;
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Playlist Manager</title>

    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background: #eee;
        }

        a {
            text-decoration: none;
            margin-right: 10px;
        }

        .add {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: green;
            color: white;
        }
    </style>
</head>

<body>

<h1>🎵 Playlist Manager</h1>

<a class="add" href="index.php?action=create">
    + Add Playlist
</a>

<table>

    <tr>
        <th>ID</th>
        <th>Playlist Name</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

    <?php foreach ($playlists as $playlist): ?>

        <tr>

            <td>
                <?= htmlspecialchars($playlist['id']) ?>
            </td>

            <td>
                <?= htmlspecialchars($playlist['name']) ?>
            </td>

            <td>
                <?= htmlspecialchars($playlist['description']) ?>
            </td>

            <td>

                <a href="index.php?action=edit&id=<?= $playlist['id'] ?>">
                    Edit
                </a>

                <a
                    href="index.php?action=delete&id=<?= $playlist['id'] ?>"
                    onclick="return confirm('Are you sure you want to delete this playlist?')"
                >
                    Delete
                </a>

            </td>

        </tr>

    <?php endforeach; ?>

</table>

</body>
</html>