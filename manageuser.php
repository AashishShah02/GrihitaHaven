<?php
$host = 'localhost';
$dbname = 'grihita_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Add User
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (!empty($username) && !empty($email)) {
        $stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (:username, :email)");
        $stmt->execute(['username' => $username, 'email' => $email]);
        header("Location: {$_SERVER['PHP_SELF']}"); // Refresh the page to show updated user list
        exit;
    }
}

// Update User
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (!empty($id) && !empty($username) && !empty($email)) {
        $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email WHERE id = :id");
        $stmt->execute(['id' => $id, 'username' => $username, 'email' => $email]);
        header("Location: {$_SERVER['PHP_SELF']}"); // Refresh the page to show updated user list
        exit;
    }
}

// Delete User
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $id = $_POST['id'];

    if (!empty($id)) {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: {$_SERVER['PHP_SELF']}"); // Refresh the page to show updated user list
        exit;
    }
}

// Fetch All Users
function getUsers($pdo) {
    $stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$users = getUsers($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>User Management</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="layout">
        <?php include 'sidebar.php'; ?>

        <div class="main-content">
            <h2>User Management</h2>

            <!-- Add User Form -->
            <form method="POST" class="form">
                <h3>Add User</h3>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit" name="add_user">Add User</button>
            </form>

            <!-- User List -->
            <h3>User List</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <!-- Edit Form -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <input type="text" name="username" value="<?= $user['username'] ?>" required>
                                <input type="email" name="email" value="<?= $user['email'] ?>" required>
                                <button type="submit" name="update_user">Update</button>
                            </form>

                            <!-- Delete Form -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button type="submit" name="delete_user">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
