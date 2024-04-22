<?php
// Connect to your MySQL database
$host = "localhost";
$username = "username";
$password = "password";
$database = "caravan_renting";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get caravan listing ID from URL parameter
$listing_id = $_GET['id'];

// Fetch caravan listing details from the database
$sql = "SELECT * FROM caravan_listings WHERE id = $listing_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output detailed summary of the caravan listing
    $row = mysqli_fetch_assoc($result);
    echo "Title: " . $row["title"]. "<br>";
    echo "Description: " . $row["description"]. "<br>";
    echo "Price: $" . $row["price"]. "<br>";
    // Add more details here as needed
} else {
    echo "Caravan listing not found";
}

mysqli_close($conn);
?>
