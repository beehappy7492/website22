<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caravan Listings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Caravan Listings</h2>
        <ul class="listing">
            <?php
            $host = "localhost"; // Your database host
            $username = "root"; // Your database username
            $password = ""; // Your database password
            $database = "rentmycar"; // Your database name
    
            $conn = mysqli_connect($host, $username, $password, $database);
    
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
    
            $sql = "SELECT * FROM vehicle_details";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                // Display listings if available
                echo "<ul>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<li class="listing-item"><img src="image/' . $row["image_url"] . '" alt="Caravan Image"><div class="listing-content"><h3>' . $row["vehicle_id"] . '</h3></div></li>';
                }
                echo "</ul>";
            } else {
                // Display message if no listings found
                echo "No caravan listings found";
            }
            ?>
        </ul>
        <br>
        <a href="add.html">Add a Listing</a> | <a href="remove_listing.php">Remove a Listing</a>
    </div>
    <div class="footer">
        &copy; 2024 Caravan Listings. All rights reserved.
    </div>
</body>
</html>