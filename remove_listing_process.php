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

// Get form data
$listing_id = $_POST['vehicle_id'];

// Remove listing from the database
$sql = "DELETE FROM vehicle_details WHERE vehicle_id = $listing_id";

if (mysqli_query($conn, $sql)) {
    echo "Listing removed successfully";
    $file = "./listings/listing$listing_id.php";
    
    if (file_exists($file)) {
        unlink($file);
    } else {
        echo "File not found";
    }
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

