
<?php


/* session_start();  */ // Start the session


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tours List</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #007BFF;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #007BFF;
        color: #fff;
        font-weight: bold;
    }

    td {
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    tr:last-child td {
        border-bottom: none;
    }

    @media (max-width: 600px) {
        table, th, td {
            display: block;
            width: 100%;
        }

        th {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
        }

        td {
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        td:before {
            content: attr(data-label);
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }
    }
</style>
</head>
<body>
<h1>Tours List</h1>
<table>
    <tr>
        <th>Tour ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Destination</th>
        <th>Tour Date</th>
        <th>Created At</th>
    </tr>
    <?php foreach ($tours as $tour): ?>
        <tr>
            <td data-label="Tour ID"><?= $tour['tour_id'] ?></td>
            <td data-label="Title"><?= htmlspecialchars($tour['title']) ?></td>
            <td data-label="Description"><?= htmlspecialchars($tour['description']) ?></td>
            <td data-label="Price"><?= $tour['price'] ?></td>
            <td data-label="Destination"><?= htmlspecialchars($tour['destination']) ?></td>
            <td data-label="Tour Date"><?= $tour['tour_date'] ?></td>
            <td data-label="Created At"><?= $tour['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

