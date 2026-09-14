<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>

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
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

<h2>Electronics Products</h2>

<table>

    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category</th>
    </tr>

    <?php foreach ($products as $product): ?>

        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td>₹<?= $product['price'] ?></td>
            <td><?= $product['category'] ?></td>
        </tr>

    <?php endforeach; ?>

</table>

</body>
</html>