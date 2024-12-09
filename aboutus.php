<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="au.css">
    <title>About Us - Grihita Haven</title>
</head>
<body>

<!-- Header Section -->

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
        
    </header>-

    <section class="about-section">
        <div class="container">
            <h1>About Us</h1>
            <p class="intro">
                Welcome to <strong>Grihita Haven</strong>, a sanctuary of hope and love for dogs in search of their forever homes. 
                Our mission is simple: to connect compassionate individuals and families with dogs in need of care, 
                companionship, and a place to call home.
            </p>
            <div class="content">
                <h2>Why Choose Grihita Haven?</h2>
                <ul>
                    <li><strong>Tailored Matching:</strong> We take pride in ensuring that every dog finds the perfect family that matches their personality and needs. From energetic pups to calm senior dogs, we help you find a furry companion who will fit seamlessly into your life.</li>
                    <li><strong>Compassionate Care:</strong> All our dogs are treated with the utmost care and respect. They receive regular medical checkups, vaccinations, and rehabilitation when needed to prepare them for their new journey.</li>
                    <li><strong>Advocating for Responsible Adoption:</strong> Adoption is not just about giving a dog a home; it’s about giving them the life they deserve. We provide resources, guidance, and post-adoption support to ensure a smooth transition for both dogs and adopters.</li>
                </ul>
            </div>
            <p class="call-to-action">
                When you adopt from <strong>Grihita Haven</strong>, you’re not just saving one life—you’re creating a ripple effect of change. 
                Your adoption allows us to rescue and care for even more dogs in need.
            </p>
            <a href="Dog.php" class="btn">Explore Dogs for Adoption</a>
        </div>
    </section>


<!--Footer-Section-->

    <footer>
        <div class="footer-content">
            <h1>Grihita Haven</h1>
            <ul class="footer-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Agent</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Listing</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="social-icons">
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            </div>
            <p>Copyright ©2021 All rights reserved | This template is made with <span>♥</span> by <a href="#">Grihita Haven</a></p>
        </div>
    </footer>
</body>
</html>
