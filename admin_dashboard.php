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
        $query_dog = "SELECT * FROM dogs";
        $result_dog = mysqli_query($conn, $query_dog);
        $total_dog = mysqli_num_rows($result_dog);

        $query_user = "SELECT * FROM users";
        $result_user = mysqli_query($conn, $query_user);
        $total_user = mysqli_num_rows($result_user);

        $query_adoption = "SELECT * FROM dogadoption";
        $result_adoption = mysqli_query($conn, $query_adoption);
        $total_adoption = mysqli_num_rows($result_adoption);
        ?>
        <div class="stat-card">
          <h3>Total Dogs <i class="fas fa-dog"></i></h3>
          <span>🐶</span>
       
          <p> <?= $total_dog?></p>
        </div>
        <div class="stat-card">
          <h3>Total Users <i class="fas fa-users"></i></h3>
          <Span>👥</Span>
          <p> <?= $total_user ?></p>
        </div>
        <div class="stat-card">
            <h3>Total Adoption <i class="fas fa-adoption"></i></h3>
            <span>🍼</span>
            <p> <?=   $total_adoption ?></p>
          </div>
      </section>

      

</body>
</html>