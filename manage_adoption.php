<?php
session_start();
 
$conn = new mysqli("localhost", "root", "", "grihita_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in and is an admin
if (!isset($_SESSION['roles']) || $_SESSION['roles'] != "admin") {
    header("Location: index.php");
    exit();
}

// Handle status update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $id = $_POST['adoption_id'];
    $status = $_POST['status'];
    $updateQuery = "UPDATE dogadoption SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $status, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Status updated successfully!'); window.location.href='manage_adoption.php';</script>";
    } else {
        echo "<script>alert('Error updating status.');</script>";
    }
}

// Fetch adoption records
$query = "SELECT da.id, d.name AS dog_name, d.breed AS dog_breed, d.location AS dog_location, da.status 
          FROM dogadoption da 
          INNER JOIN dogs d ON da.dog = d.id";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>Manage Dog Adoptions</title>
    <style>
      
        .adoption-container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        .update-form select, .update-form button {
            padding: 5px;
            margin: 2px;
        }
        .update-form button {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        .update-form button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
<?php include 'admin_header.php'; ?>
<?php include 'admin_sidebar.php'; ?>
<div class="adoption-container">
    <h1>Manage Dog Adoption Requests</h1>
    <?php if ($result->num_rows > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Dog</th>
                <th>Breed</th>
                <th>Location</th>
                <th>Status</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1;
            while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= htmlspecialchars($row['dog_name']); ?></td>
                <td><?= htmlspecialchars($row['dog_breed']); ?></td>
                <td><?= htmlspecialchars($row['dog_location']); ?></td>
                <td><?= htmlspecialchars($row['status']); ?></td>
                <td>
                    <form class="update-form" method="POST">
                        <input type="hidden" name="adoption_id" value="<?= $row['id']; ?>">
                        <select name="status">
                            <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="Approved" <?= $row['status'] == 'Approved' ? 'selected' : ''; ?>>Approved</option>
                            <option value="Rejected" <?= $row['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                        </select>
                        <button type="submit" name="update_status">Update</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No adoption records found.</p>
    <?php } ?>
</div>
</body>
</html>
