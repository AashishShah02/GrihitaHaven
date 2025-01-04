<?php
session_start();

// Database connection variables
$host = 'localhost';
$dbname = 'grihita_db'; // Replace with your database name
$db_username = 'root'; // Replace with your database username
$db_password = ''; // Replace with your database password

try {
    // Create a PDO instance for database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare a SQL statement to select the user with the provided email
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if the user exists
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Login successful
                $_SESSION['user_id'] = $user['id'];
                $_SESSION["user_image"]=$user["profile_picture"];
                $_SESSION['username'] = $user['username'];

                // Check if 'roles' exists in the fetched data
                if (isset($user['roles'])) {
                    $_SESSION['roles'] = $user['roles'];
                } else {
                    // Set a default role if roles column is missing or empty
                    $_SESSION['roles'] = 'user'; // Default role
                }
                
                // Redirect to a protected page or dashboard
                header("Location: index.php");
                exit();
            } else {
                // Incorrect password
                echo "Incorrect email or password.";
            }
        } else {
            // Email not found
            echo "Incorrect email or password.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
