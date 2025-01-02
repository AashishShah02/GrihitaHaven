<?php
session_start();
?>

<?php
include 'db.php'; ?>

<?php
echo$_SESSION['roles'];
if(!isset($_SESSION['roles'] )&& $_SESSION['roles']!="admin"){
    header("Location: index.php");
}
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

<?php include 'admin_header.php'; ?>
<?php include 'admin_sidebar.php'; ?>
<section class="stats">
        <?php
        $query_book = "SELECT * FROM dogs";
        $result_book = mysqli_query($conn, $query_book);
        $total_books = mysqli_num_rows($result_book);

        $query_user = "SELECT * FROM users";
        $result_user = mysqli_query($conn, $query_user);
        $total_user = mysqli_num_rows($result_user);


        ?>
        <div class="stat-card">
          <h3>Total Dogs <i class="fas fa-book"></i></h3>
          <p> <?= $total_books ?></p>
        </div>
        <div class="stat-card">
          <h3>Total Users <i class="fas fa-users"></i></h3>
          <p> <?= $total_user ?></p>
        </div>
      </section>

</body>
</html>