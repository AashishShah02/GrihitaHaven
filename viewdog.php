<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "grihita_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM dogs";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Details</title>
    <style>
        .dog-container {
            margin-top:5px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content:center;
        }
        .dog-card {
            
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background: #fff;
            max-width: 250px;
            text-align: center;
        }
        .dog-card img {
            max-width: 100%;
            border-radius: 8px;
        }
        .dog-card h2 {
            margin: 0px 0;
            font-size: 20px;
        }
        .dog-card p{
            font-size:15px;
        }
    </style>
</head>
<body>
    <div class="dog-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="dog-card">
            <img src="<?php echo $row['image_location']; ?>" alt="Dog Image">
            <h2><?php echo $row['name']; ?></h2>
            <p><?php echo $row['breed']; ?></p>
            <p>📍<?php echo $row['location']; ?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>
