<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grihita Haven</title>
   <!-- <link rel="stylesheet" href="au.css"> -->
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
        
/* Header Styling */
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
    color: #4CAF50;
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

/* Hero Section */
.hero {
    height: 95vh;
    background-image: url('Images/homebanner.jpg'); /* Add path to your image */
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    text-align: center;
}

.hero h1 {
    font-size: 3.5rem;
    margin-bottom: 20px;
    font-weight: bold;
    color: #fff;
    line-height: 1.2;
    font-family: "Montserrat", Arial, sans-serif;
    font-weight: 800;
}

.hero .btn {
    display: inline-block;
    padding: 15px 30px;
    background-color: #00bfae;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 5px;
    transition: background-color 0.3s;
    background: #00bd56;
    border: 1px solid #00bd56;
    color: #fff;
}

.hero .btn:hover {
    background-color: rgba(0, 0, 0, 0);
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px;
}

.content {
    display: flex;
    align-items: center;
    max-width: 1200px;
    gap: 30px;
}

.pug-image {
    max-width: 450px;
    border-radius: 10px;
}

.text-section {
    flex: 1;
}

.text-section h2 {
    font-size: 32px;
    color: #333;
    margin-bottom: 20px;
}

.features {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.feature {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: left;
}

.icon {
    font-size: 30px;
    color: #4CAF50;
    margin-bottom: 10px;
}

.feature h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
}

.feature p {
    font-size: 14px;
    color: #777;
    margin: 0;
}

.booked-section{
    padding: 50px;

}
footer {
    background-color: #000;
    text-align: center;
    padding: 20px 0;
}

.footer-content h1 {
    color:#4CAF50 ;
    font-size: 1.5em;
    margin-bottom: 10px;
}

.footer-links {
    list-style: none;
    padding: 30px;
    margin: 10px 0;
    display: flex;
    justify-content: center;
    gap: 15px;
}

.footer-links li a {
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    transition: color 0.3s;
}

.footer-links li a:hover {
    color: #4CAF50;
}

.social-icons {
    margin: 10px 0;
}

.social-icons a {
    color: #4CAF50;
    margin: 0 10px;
    font-size: 1.2em;
    text-decoration: none;
    transition: color 0.3s;
}

.social-icons a:hover {
    color: #fff;
}

footer p {
    font-size: 0.9em;
    margin: 10px 0 0;
    color:grey;
}

footer p span {
    color: red;
}

footer p a {
    color: ;
    text-decoration: none;
}

footer p a:hover {
    text-decoration: underline;
}
.profile-settings{
    list-style:none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position:absolute;
    top:93px;
    right:20px;
    width:100px;
    line-height:30px;
    font-size:15px;
    display:none;
}
.profile-settings li{
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding:10px;

}
.logout-btn{
    background-color:#00bd56;
    border-radius:5px;
    height:30px;
    width:80px;
    border:none;
    color:white;
    font-weight:bold;

}

/* Dog.php css  */
.banner{
    height: 88vh;
    background-image: url('Images/Dogpagebanner.jpg'); /* Add path to your image */
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    text-align: center;
}

/* Aboutus.php css */

.about-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Header */
.about-header {
    text-align: center;
    background: linear-gradient(90deg, #4CAF50, #4CAF50);
    color: white;
    padding: 20px;
    border-radius: 12px 12px 0 0;
}

.about-header h1 {
    margin: 0;
    font-size: 2.5em;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Main Content */
.about-content {
    padding: 20px;
}

.about-section h2 {
    font-size: 2em;
    color: #4CAF50;
    margin-bottom: 10px;
    text-align: center;
}

.about-section h3 {
    font-size: 1.5em;
    margin-top: 20px;
    color: #388E3C;
}

.about-section p {
    line-height: 1.6;
    margin: 10px 0;
    text-align: justify;
}

.about-section p strong {
    color: #4CAF50;
    font-weight: bold;
}

/* Call-to-Action Button */
.about-cta {
    text-align: center;
    margin-top: 20px;
}

.about-cta .cta-button {
    text-decoration: none;
    background: #4CAF50;
    color: white;
    padding: 12px 25px;
    font-size: 1.2em;
    font-weight: bold;
    border-radius: 5px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    transition: background 0.3s, transform 0.2s;
}

.about-cta .cta-button:hover {
    background: #388E3C;
    transform: scale(1.05);
}

/* Contactus.php css */

.contact-container {
    max-width: 900px;
    margin: 50px auto;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Header */
.contact-header {
    text-align: center;
    padding: 20px;
    background:#4CAF50;
    color: white;
    border-radius: 12px 12px 0 0;
}

.contact-header h1 {
    margin: 0;
    font-size: 2.5em;
}

.contact-header p {
    margin: 10px 0 0;
    font-size: 1.2em;
}

/* Contact Information */
.contact-info {
    padding: 20px;
}

.contact-info h2 {
    font-size: 1.8em;
    color: #4CAF50;
    margin-bottom: 10px;
}

.contact-info p {
    margin: 10px 0;
    font-size: 1.1em;
    line-height: 1.6;
}

/* Contact Form */
.contact-form-section {
    padding: 20px;
    border-top: 2px solid #e0e0e0;
}

.contact-form-section h2 {
    font-size: 1.8em;
    color: #4CAF50;
    margin-bottom: 15px;
}

.contact-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1em;
}

.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #4CAF50;
    outline: none;
}

.submit-button {
    display: inline-block;
    background: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1.2em;
    cursor: pointer;
    transition: background 0.3s;
}

.submit-button:hover {
    background: #388E3C;
}

/* Social Media */
.social-media {
    text-align: center;
    padding: 20px;
    border-top: 2px solid #e0e0e0;
}

.social-media h2 {
    font-size: 1.8em;
    color: #4CAF50;
    margin-bottom: 15px;
}

.social-media .social-link {
    display: inline-block;
    margin: 5px 10px;
    text-decoration: none;
    color: white;
    background: #4CAF50;
    padding: 10px 15px;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s;
}

.social-media .social-link:hover {
    background: #388E3C;
}

/* Dogdetails.php css */
.d_container {
    max-width: 900px; /* Adjust width for the layout */
    margin: 60px auto; /* Add spacing from top */
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    display: flex;
    padding: 20px;
}

.dog-image {
    width: 40%; /* Image takes 40% of the container's width */
    height: 350px;
    object-fit: cover;
    border-radius: 10px; /* Rounded corners for the image */
    margin-right: 20px; /* Space between the image and the details */
}

.dog-details {
    width: 60%; /* Details take 60% of the container's width */
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center the details vertically */
    background: #f9f9f9;
    border-radius: 10px;
    text-align: left; /* Align text to the left for better readability */
}

.dog-details h2 {
    font-size: 28px;
    margin-bottom: 15px;
    color: #333;
    font-weight: bold;
}

.dog-details p {
    font-size: 16px;
    color: #555;
    margin: 10px 0;
    line-height: 1.6;
}

/* Center the "Adopt Now" button */
.dog-details .btn {
    align-self: center; /* This centers the button horizontally */
    padding: 12px 25px;
    background-color: #00bd56;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    margin-top: 25px;
    transition: background-color 0.3s, transform 0.2s;
}

.dog-details .btn:hover {
    background-color: #008c40;
    transform: translateY(-2px); /* Subtle hover effect */
}

/* View More Button Styling */
.view-more-container {
    text-align: center;
    margin-top: 40px; /* Space between the container and the button */
}

.view-more-btn {
    padding: 12px 25px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.2s;
}

.view-more-btn:hover {
    background-color: #0056b3;
    transform: translateY(-2px); /* Subtle hover effect */
}

</style>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">🐾 Grihita Haven</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="Dog.php">Dogs</a>
            <a href="aboutus.php">About us</a>
            <a href="contactus.php">Contact us</a>
        </nav>
        <?php
        // $_SESSION['username']
        if(isset($_SESSION['username'])){
        ?>
        <div style="display:flex;justify-content:center;align-items:center;gap:5px;">
        Welcome<span style="color:#bb5682;"><?=$_SESSION['username']?></span>

        <img src="<?=(isset( $_SESSION["user_image"]))? $_SESSION["user_image"]:"Images\user.jpg"?>" alt="" class="user-profile" id="user-profile">

        <ul class="profile-settings" id="profile-settings">
            <li><?=$_SESSION['username']?></li>
            <li><?php
            // echo$_SESSION['roles'];
            if($_SESSION['roles'] == 'admin'){
                echo "<a href='admin_dashboard.php'>Dashboard</a>";}
                else{
                    echo "<a href='user_dashboard.php'>Dashboard</a>";
                }
            ?></li>
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