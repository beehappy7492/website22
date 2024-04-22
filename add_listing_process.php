<?php
$host = "localhost";
$username = "username";
$password = "password";
$database = "caravan_renting";

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];

// Insert new listing into the database
$sql = "INSERT INTO caravan_listings (title, description, price) VALUES ('$title', '$description', '$price')";

if (mysqli_query($conn, $sql)) {
    echo "New listing added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
