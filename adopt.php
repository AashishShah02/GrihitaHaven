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
    echo "You must be logged in to view your adoption requests.";
    exit();
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Fetch the logged-in user's adoption records
$query = "SELECT da.id, d.name AS dog_name, da.status 
          FROM dogadoption da 
          INNER JOIN dogs d ON da.dog = d.id 
          WHERE da.user = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>Your Adoption Requests</h2>";
    echo "<table border='1'>
            <tr>
                <th>Adoption ID</th>
                <th>Dog Name</th>
                <th>Status</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['dog_name'] . "</td>
                <td>" . $row['status'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "You have not submitted any adoption requests.";
}

$stmt->close();
$conn->close();
?>
