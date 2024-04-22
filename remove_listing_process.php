<?php
// Connect to your MySQL database
$host = "localhost"; // Your database host
$username = "username"; // Your database username
$password = "password"; // Your database password
$database = "caravan_renting"; // Your database name

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$listing_id = $_POST['listing_id'];

// Remove listing from the database
$sql = "DELETE FROM caravan_listings WHERE id = $listing_id";

if (mysqli_query($conn, $sql)) {
    echo "Listing removed successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
