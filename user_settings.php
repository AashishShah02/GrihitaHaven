<?php
// Start session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "grihita_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

$userId = $_SESSION["user_id"];

// Fetch existing user data
$sql = "SELECT username, email, profile_picture FROM users WHERE id = '$userId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    die("User data not found.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    
    // Check if password is provided
    $passwordUpdate = "";
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $passwordUpdate = ", password='$password'";
    }

    // Check if a new profile picture is uploaded
    if (!empty($_FILES["profile_picture"]["name"])) {
        $targetDir = "uploads/";
        $imageFileType = strtolower(pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION));
        $targetFile = $targetDir . uniqid() . "." . $imageFileType;

        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            // Update with new profile picture
            $sql = "UPDATE users SET username='$username', email='$email', profile_picture='$targetFile' $passwordUpdate WHERE id='$userId'";
        } else {
            echo "Error uploading image.";
            exit();
        }
    } else {
        // Update without changing profile picture
        $sql = "UPDATE users SET username='$username', email='$email' $passwordUpdate WHERE id='$userId'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "User details updated successfully!";
        header("Location: user_settings.php"); // Redirect after update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<?php include 'user_header.php'; ?>
<?php include 'user_sidebar.php'; ?>

<style>
    form {
        font-family: Arial, sans-serif;
        background: #1a1a1a;
        padding: 50px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        width: 350px;
        margin: auto;
    }
    h2 {
        text-align: center;
        color: #00ff00;
    }
    label {
        display: block;
        margin-top: 10px;
        color: #ccc;
    }
    input, select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #00ff00;
        border-radius: 4px;
        background: #222;
        color: #fff;
    }
    input::placeholder {
        color: #888;
    }
    button {
        margin-top: 15px;
        width: 100%;
        padding: 12px;
        background-color: #00ff00;
        color: black;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
    }
    button:hover {
        background-color: #00cc00;
    }
    .profile-preview {
        text-align: center;
        margin-bottom: 15px;
    }
    .profile-preview img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #00ff00;
    }
</style>

<body>
    <main class="dashboard-main">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Update Profile</h2>

            <!-- Profile Picture Preview -->
            <div class="profile-preview">
                <img src="<?= $userData['profile_picture'] ? $userData['profile_picture'] : 'Images\user.jpg'; ?>" alt="Profile Picture">
            </div>

            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($userData['username']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($userData['email']); ?>" required>

            <label for="password">New Password (leave blank to keep current):</label>
            <input type="password" id="password" name="password" placeholder="Enter new password">

            <button type="submit">Update Profile</button>
        </form>
    </main>
</body>
</html>
