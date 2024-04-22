<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Caravan Listing</title>
</head>
<body>
    <h2>Add Caravan Listing</h2>
    <form action="add_listing_process.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" required><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
