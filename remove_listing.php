<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Caravan Listing</title>
</head>
<body>
    <h2>Remove Caravan Listing</h2>
    <form action="remove_listing_process.php" method="post">
        <label for="vehicle_id">Vehicle ID:</label><br>
        <input type="number" id="vehicle_id" name="vehicle_id" required><br>
        
        <button type="submit">Remove Listing</button>
    </form>
</body>
</html>
