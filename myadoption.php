<?php
// Start session and include database connection
session_start();
$conn = new mysqli("localhost", "root", "", "grihita_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch adoption data along with user and dog details
$sql = "SELECT 
            dogadoption.id AS adoption_id, 
            users.username AS user_name, 
            dogs.name AS dog_name, 
            dogadoption.status AS adoption_status 
        FROM dogadoption
        INNER JOIN users ON dogadoption.user = users.id
        INNER JOIN dogs ON dogadoption.dog = dogs.id";

$result = $conn->query($sql);

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
                    <th>User</th>
                    <th>Dog</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['adoption_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['dog_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['adoption_status']); ?></td>
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
