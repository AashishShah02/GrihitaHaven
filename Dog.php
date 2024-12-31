<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        /* Basic Reset */
       * {
           margin: 0;
           padding: 0;
           box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #fff;
        }
        
        a {
            text-decoration: none;
        }
        

        .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 40px;
    background-color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.user-profile{
    height:50px;
    width:50px;
    border-radius:50px;
}

.header .logo {
    font-size: 24px;
    font-weight: bold;
    color: #ff6f61;
}

.header nav a {
    /* margin: 0 15px;
    color: #333;
    text-decoration: none;
    font-weight: 500; */
    font-size: 14px;
    padding-top: 2.3rem;
    padding-bottom: 2.3rem;
    padding-left: 18px;
    padding-right: 18px;
    font-weight: 700;
    color: #000000;
    position: relative;
    text-transform: uppercase;
    opacity: 1 !important;
}
.header nav.active > a {
    color: #00bd56;
}
.header .sign-in {
    background-color: #333;
    color: #fff;
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
}
.banner{
    height: 75vh;
    background-image: url('Images/Dogpagebanner.jpg'); /* Add path to your image */
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    text-align: center;
}
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">🐾 Grihita Haven</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="#">Dogs</a>
            <a href="aboutus.php">About us</a>
        </nav>
        <?php
        // $_SESSION['username']
        if(isset($_SESSION['username'])){
        ?>
        <div style="display:flex;justify-content:center;align-items:center;gap:5px;">
        Welcome<span style="color:#bb5682;"><?=$_SESSION['username']?></span>
        <img src="Images\user.jpg" alt="" class="user-profile" id="user-profile">
        <ul class="profile-settings" id="profile-settings">
            <li><?=$_SESSION['username']?></li>
            <li><a href="dashboard.php"> Dashboard</a></li>
            <li> <?php
        if(isset($_SESSION["user_id"]) and isset($_SESSION["username"])){

            ?>
             <form action="logout.php"><button type='submit' class="logout-btn">logout</button></form>
             <?php
            }?></li>
        </ul>
        <div>
        <?php
        }else{
        ?>
        <a href="hi.php">
        <button class="sign-in">Sign in</button>
        </a>
        <?php
        }
        ?>
        
    </header>
    <section class="booked-section">
        <h2>Frequently Listed</h2>
        <?php include 'viewdog.php'; ?>
        </div>
    </section>
    <div class="banner"></div>


</body>
</html>