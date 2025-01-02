<?php
// Start session to access the logged-in user
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "grihita_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to adopt a dog.";
    exit();
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Validate and retrieve the dog ID from the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $dogId = intval($_GET['id']);

    // Check if the dog exists in the database
    $checkDogQuery = "SELECT id FROM dogs WHERE id = ?";
    $stmt = $conn->prepare($checkDogQuery);
    $stmt->bind_param("i", $dogId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "The selected dog does not exist.";
        exit();
    }

    // Insert the adoption record
    $insertQuery = "INSERT INTO dogadoption (user, dog, status) VALUES (?, ?, 'Pending')";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ii", $userId, $dogId);

    if ($stmt->execute()) {
        echo "Adoption request submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Invalid request.";
}

$stmt->close();
$conn->close();
?>
