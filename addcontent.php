<?php
session_start();
?>
<?php
if(!isset($_SESSION['roles'] )&& $_SESSION['roles']!="admin"){
    header("Location: index.php");
}
// Database connection
$conn = new mysqli("localhost", "root", "", "grihita_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
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
        // SQL query to insert data
        $sql = "INSERT INTO dogs (image_location, breed, name, location, description) 
                VALUES ('$targetFile', '$breed', '$name', '$location', '$description')";

        if ($conn->query($sql) === TRUE) {
            $dogId = $conn->insert_id; // Get the last inserted ID
            header("Location: Dog.php?id=$dogId"); // Redirect to the dog details page
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dog Information</title>
    <link rel="stylesheet" href="addcontent.css">
</head>
<body>
<?php include 'admin_header.php'; ?>
<div class="layout">
    <?php include 'admin_sidebar.php'; ?>
    <div class="container">
        <h1>Add Dog Details</h1>
        <form action="add_dog.php" method="POST" enctype="multipart/form-data">
            <label for="image">Dog Image:</label>
            <input type="file" name="image" id="image" required>
            
            <label for="name">Dog Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="breed">Breed:</label>
            <input type="text" name="breed" id="breed" required>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>

            <label for="descriptiom">Description:</label>
            <input type="text" name="description" id="description" required>

            <button type="submit">Add Dog</button>
        </form>
    </div>
</div>
</body>
</html>
