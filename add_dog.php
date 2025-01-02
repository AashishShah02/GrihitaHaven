<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "grihita_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $breed = $conn->real_escape_string($_POST['breed']);
    $name = $conn->real_escape_string($_POST['name']);
    $location = $conn->real_escape_string($_POST['location']);
    $description = $conn->real_escape_string($_POST['description']);

    // Handle image upload
    $targetDir = "uploads/";
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDir . uniqid() . "." . $imageFileType;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO dogs (image_location, breed, name, location,description) VALUES ('$targetFile', '$breed', '$name' , '$location', '$description')";

        if ($conn->query($sql) === TRUE) {
            echo "New dog details added successfully!";
            $dogId = $conn->insert_id; // Get the last inserted ID
            header("Location:http://localhost/GrihitaHaven/dog_details.php?id=$dogId"); // Redirect to the dog details page
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
}

$conn->close();
?>
