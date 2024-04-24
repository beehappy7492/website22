<?php

// Connect to your MySQL database
$host = "localhost"; // Your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "rentmycar"; // Your database name

// Establish connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form inputs
    $user_id = $_POST['user_id'];
    $vehicle_id = $_POST['vehicle_id'];
    $vehicle_make = $_POST['vehicle_make'];
    $vehicle_model = $_POST['vehicle_model'];
    $vehicle_bodytype = $_POST['vehicle_bodytype'];
    $fuel_type = $_POST['fuel_type'];
    $mileage = $_POST['mileage'];
    $location = $_POST['location'];
    $year = $_POST['year'];
    $num_doors = $_POST['num_doors'];

    // Handle file upload
    $target_dir = "image/";
    $fileName = basename($_FILES["image_url"]["name"]);
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image_url"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image_url"]["size"] > 500000000000000000000000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image_url"]["name"])). " has been uploaded.";

            // Set appropriate permissions for the uploaded file
            chmod($target_file, 0644); // Change permissions to allow read access for everyone and write access for owner

            // SQL insertion part
            $sql = "INSERT INTO vehicle_details (user_id, vehicle_id, vehicle_make, vehicle_model, vehicle_bodytype, fuel_type, mileage, location, year, num_doors, image_url) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("iissssisiis", $user_id, $vehicle_id, $vehicle_make, $vehicle_model, $vehicle_bodytype, $fuel_type, $mileage, $location, $year, $num_doors, $fileName);
                if($stmt->execute()){
                    echo "New listing added successfully";

                    // Fetch the ID of the newly added listing
                    $listing_id = $stmt->insert_id;

                    // Create the PHP file for the new listing
                    $listing_file = fopen("listing$listing_id.php", "w") or die("Unable to create listing file!");

                    // Define the content using heredoc syntax
                    $content = <<<PHP
<?php
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Car Listing</title>";
echo "</head>";
echo "<body>";
echo "<p>User ID: $user_id</p>";
echo "<p>Vehicle ID: $vehicle_id</p>";
echo "<p>Vehicle Make: $vehicle_make</p>";
echo "<p>Vehicle Model: $vehicle_model</p>";
echo "<p>Vehicle Body Type: $vehicle_bodytype</p>";
echo "<p>Fuel Type: $fuel_type</p>";
echo "<p>Mileage: $mileage</p>";
echo "<p>Location: $location</p>";
echo "<p>Year: $year</p>";
echo "<p>Number of Doors: $num_doors</p>";
echo '<img src="$target_file" width=400 height=400>';
echo "</body>";
echo "</html>";
?>
PHP;

                    // Write the content to the file
                    fwrite($listing_file, $content);
                    fclose($listing_file);
                    echo "<br>";
                    echo "<a href='listing$listing_id.php'>View Listing</a>";
                } else{
                    echo "Error: Could not execute query: $sql. " . $conn->error;
                }
            }
            // Close statement
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Close connection
$conn->close();
?>
