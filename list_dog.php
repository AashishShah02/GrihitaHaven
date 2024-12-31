<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "grihita_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all dogs
$sql = "SELECT id, breed, name FROM dogs";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog List</title>
</head>
<body>
    <h1>All Dogs</h1>
    <ul>
        <?php while ($dog = $result->fetch_assoc()): ?>
            <li>
                <a href="view_dog.php?id=<?= htmlspecialchars($dog['id']); ?>">
                    <?= htmlspecialchars($dog['name']); ?> (<?= htmlspecialchars($dog['breed']); ?>)
                </a>
            </li>
        <?php endwhile; ?>
    </ul>

    <a href="add_dog.php">Add New Dog</a>
</body>
</html>
