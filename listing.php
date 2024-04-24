<?php
// Connect to your MySQL database
$host = "localhost"; // Your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "rentmycar"; // Your database name

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' parameter is set in the URL
if (!isset($_GET['vehicle_id']) || empty($_GET['vehicle_id'])) {
    die("Caravan ID is missing in the URL.");
}

// Get caravan listing ID from URL parameter
$listing_id = $_GET['vehicle_id'];

// Fetch caravan listing details from the database
$sql = "SELECT * FROM vehicle_details WHERE vehicle_id = $listing_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error retrieving listing: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Output detailed summary of the caravan listing
    $row = mysqli_fetch_assoc($result);
    echo "vehicle_id: " . $row["vehicle_id"]. "<br>";
    echo "user_id: " . $row["user_id"]. "<br>";
    echo "vehicle_make: " . $row["vehicle_make"]. "<br>";
    echo "vehicle_model: " . $row["vehicle_model"]. "<br>";
    echo "vehicle_bodytype: " . $row["vehicle_bodytype"]. "<br>";
    echo "fuel_type: " . $row["fuel_type"]. "<br>";
    echo "mileage: " . $row["mileage"]. "<br>";
    echo "location: " . $row["location"]. "<br>";
    echo "year: " . $row["year"]. "<br>";
    echo "num_doors: " . $row["num_doors"]. "<br>";
    echo "image_url: " . $row["image_url"]. "<br>";
    // Add more details here as needed
} else {
    echo "Caravan listing not found";
}

mysqli_close($conn);
?>
