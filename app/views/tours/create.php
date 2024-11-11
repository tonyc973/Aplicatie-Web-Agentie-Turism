<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tour</title>
</head>
<body>
    <h1>Create a New Tour</h1>
    <form action="/caietul_mereu/tours/create" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="price">Price (EUR):</label>
        <input type="number" id="price" name="price" required><br><br>

        <button type="submit">Create Tour</button>
    </form>
</body>
</html>


