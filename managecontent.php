<?php
session_start();
?>
<?php
 if(!isset($_SESSION['roles'] )&& $_SESSION['roles']!="admin"){
        header("Location: index.php");
    }
// Database connection
$conn = new mysqli("localhost", "root", "", "grihita_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_dog"])) {
    $id = $conn->real_escape_string($_POST['id']);
    $breed = $conn->real_escape_string($_POST['breed']);
    $name = $conn->real_escape_string($_POST['name']);
    $location = $conn->real_escape_string($_POST['location']);

    $sql = "UPDATE dogs SET breed='$breed', name='$name', location='$location' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Dog details updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle Delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_dog"])) {
    $id = $conn->real_escape_string($_POST['id']);

    // Delete the file associated with the entry
    $result = $conn->query("SELECT image_location FROM dogs WHERE id=$id");
    if ($row = $result->fetch_assoc()) {
        if (file_exists($row['image_location'])) {
            unlink($row['image_location']);
        }
    }

    $sql = "DELETE FROM dogs WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Dog details deleted successfully!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch All Records
$result = $conn->query("SELECT * FROM dogs ORDER BY id DESC");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dog.css">
    <title>Manage Dog Details</title>
</head>
<body>
<?php include 'admin_header.php'; ?>
    <div class="layout">
        <?php include 'admin_sidebar.php'; ?>
    <div class="container">
    <h1>Manage Dog Details</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><img src="<?= $row['image_location'] ?>" alt="Dog Image" width="100"></td>
                        <td>
                            <!-- Update Form -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="text" name="breed" value="<?= $row['breed'] ?>" required>
                                <input type="text" name="name" value="<?= $row['name'] ?>" required>
                                <input type="text" name="location" value="<?= $row['location'] ?>" required>
                                <button type="submit" name="update_dog">Update</button>
                            </form>

                            <!-- Delete Form -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="delete_dog">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
            </div>
</body>
</html>
