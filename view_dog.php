<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "grihita_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed in the query string
if (isset($_GET['id'])) {
    $dogId = intval($_GET['id']); // Sanitize input

    // Fetch dog details from the database
    $sql = "SELECT * FROM dogs WHERE id = $dogId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $dog = $result->fetch_assoc();
    } else {
        echo "Dog not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Details</title>
</head>
<body>
    <h1>Dog Details</h1>
    <img src="<?= htmlspecialchars($dog['image_location']); ?>" alt="Dog Image" style="max-width:300px; height:auto;">
    <p><strong>Breed:</strong> <?= htmlspecialchars($dog['breed']); ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($dog['name']); ?></p>
    <p><strong>Location:</strong> <?= htmlspecialchars($dog['location']); ?></p>

    <a href="index.php">Back to Home</a>
</body>
</html>
