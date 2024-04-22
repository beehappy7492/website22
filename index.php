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

// Fetch all caravan listings from the database
$sql = "SELECT * FROM caravan_listings";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Caravan: " . $row["title"]. " - <a href='listing.php?id=" . $row["id"] . "'>View Details</a><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
