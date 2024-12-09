<?php
// Database connection variables
$host = 'localhost';
$dbname = 'grihita_db'; // replace with your database name
$username = 'root'; // replace with your database username
$password = ''; // replace with your database password

try {
    // Create a PDO instance for database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

        // Insert data into the database
        $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Execute the query
        if ($stmt->execute()) {
            // echo "Registration successful!";
            // Redirect to a login page or dashboard if desired
            header("Location: hi.php");
            exit();
        } else {
            echo "Error: Could not complete the registration.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
