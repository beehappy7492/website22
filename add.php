<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Caravan Listing</title>
    <link rel = "stylesheet" href = "add.css">
</head>
<body>
    <h2>Add Caravan Listing</h2>
    <form action="addprocess.php" method="post" enctype="multipart/form-data">
        <label for="vehicle_id">Vehicle ID:</label><br>
        <input type="text" id="vehicle_id" name="vehicle_id" required><br>
        
        <label for="user_id">User ID:</label><br>
        <input type="text" id="user_id" name="user_id" required><br>
        
        <label for="vehicle_make">Make:</label><br>
        <input type="text" id="vehicle_make" name="vehicle_make" required><br>
        
        <label for="vehicle_model">Model:</label><br>
        <input type="text" id="vehicle_model" name="vehicle_model" required><br>
        
        <label for="vehicle_bodytype">Body Type:</label><br>
        <input type="text" id="vehicle_bodytype" name="vehicle_bodytype" required><br>
        
        <label for="fuel_type">Fuel Type:</label><br>
        <input type="text" id="fuel_type" name="fuel_type" required><br>
        
        <label for="mileage">Mileage:</label><br>
        <input type="number" id="mileage" name="mileage" required><br>
        
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br>
        
        <label for="year">Year:</label><br>
        <input type="number" id="year" name="year" required><br>
        
        <label for="num_doors">Number of Doors:</label><br>
        <input type="number" id="num_doors" name="num_doors" required><br>

        <label for="image_url">Upload Image:</label><br>
        <input type="file" id="image_url" name="image_url" required/><br>

        <button type="submit" id="submit" name="submit" value="submit">Submit</button>
    </form>
</body>
</html>


