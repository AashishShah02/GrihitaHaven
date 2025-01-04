<?php
// Start session and include database connection
session_start();
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

$userId = $_SESSION['user_id'];
 

// Fetch the logged-in user's adoption records
$query = "SELECT da.id, d.name AS dog_name,d.breed as dog_breed,d.location as dog_location, da.status 
          FROM dogadoption da 
          INNER JOIN dogs d ON da.dog = d.id 
          WHERE da.user = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

 

?>
<?php include 'user_header.php'; ?>
<?php include 'user_sidebar.php'; ?>
</head>
<body>
    <div class="Adoption_container">
        <h1>Dog Adoption Records</h1>
        <?php if ($result->num_rows > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Dog</th>
                    <th>Breed</th>
                    <th>Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count=1;
                while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?=$count++;?></td>
                    <td><?php echo htmlspecialchars($row['dog_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['dog_breed']); ?></td>
                    <td><?php echo htmlspecialchars($row['dog_location']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
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
<?php
$conn->close();
?>
