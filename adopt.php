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
    echo "<script>alert('You must be logged in to adopt a dog.'); window.location.href='login.php';</script>";
    exit();
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Get the Dog ID from the request
if (!isset($_GET["id"])) {
    echo "<script>alert('Invalid dog ID.'); window.location.href='dogs.php';</script>";
    exit();
}

$dogId = $_GET["id"];

// Check if the user has already adopted the dog
$checkQuery = "SELECT id FROM dogadoption WHERE user = ? AND dog = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("ii", $userId, $dogId);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // If record exists, show alert
    echo "<script>alert('You have already submitted an adoption request for this dog.'); window.location.href='dog_details.php?id=$dogId';</script>";
    $stmt->close();
    $conn->close();
    exit();
}

$stmt->close();

// Insert the adoption request into the dogadoption table
$insertQuery = "INSERT INTO dogadoption (user, dog, status) VALUES (?, ?, 'pending')";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ii", $userId, $dogId);

if ($stmt->execute()) {
    echo "<script>alert('Adoption request submitted successfully!'); window.location.href='dog_details.php?id=$dogId';</script>";
} else {
    echo "<script>alert('Error submitting adoption request: " . $conn->error . "'); window.location.href='dog_details.php?id=$dogId';</script>";
}

$stmt->close();
$conn->close();
?>
