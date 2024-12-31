<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grihita Haven</title>
   <link rel="stylesheet" href="sty.css">
   
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
    color: white;
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
    color: #7adf8f;
}

.social-icons {
    margin: 10px 0;
}

.social-icons a {
    color: #7adf8f;
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

</style>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">🐾 Grihita Haven</div>
        <nav>
            <a href="#">Home</a>
            <a href="Dog.php">Dogs</a>
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

    <!-- Main Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>"Every dog deserves a home, <br>and every home deserves a <br> dog"</h1>
            <a href="#learn-more" class="btn">LEARN MORE</a>
        </div>
    </section>

    <div class="container">
        <div class="content">
            <img src="Images/GR.png" alt="Pug" class="pug-image">
            <div class="text-section">
                <h2>Why Choose Us?</h2>
                <div class="features">
                    <div class="feature">
                        <div class="icon">💡</div>
                        <h3> Save a Life</h3>
                        <p>Millions of dogs are in shelters waiting for homes. By adopting, you're giving a deserving dog a second chance at life and potentially saving it from euthanasia.</p>
                    </div>
                    <div class="feature">
                        <div class="icon">🤝</div>
                        <h3>Unconditional Love and Companionship</h3>
                        <p>Dogs are incredibly loyal and loving companions. They can provide emotional support, reduce loneliness, and bring joy to your everyday life.</p>
                    </div>
                    <div class="feature">
                        <div class="icon">🚑</div>
                        <h3>Support Ethical Practices</h3>
                        <p>Adoption helps reduce the demand for unethical puppy mills and backyard breeders, which often prioritize profit over the well-being of animals.</p>
                    </div>
                    <div class="feature">
                        <div class="icon">🐾</div>
                        <h3>Improved Mental and Physical Health</h3>
                        <p>Studies show that spending time with dogs can reduce stress, anxiety, and depression while improving overall happiness.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <section class="booked-section">
        <h2>Frequently Listed</h2>
        <?php include 'viewdog.php'; ?>
        </div>
    </section>
    <!-- Add other sections as needed -->


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
                <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="currentColor"><path d="M1 2h2.5L3.5 2h-2.5zM5.5 2h2.5L7.2 2h-2.5z"><animate fill="freeze" attributeName="d" dur="0.4s" values="M1 2h2.5L3.5 2h-2.5zM5.5 2h2.5L7.2 2h-2.5z;M1 2h2.5L18.5 22h-2.5zM5.5 2h2.5L23 22h-2.5z"/></path><path d="M3 2h5v0h-5zM16 22h5v0h-5z"><animate fill="freeze" attributeName="d" begin="0.4s" dur="0.4s" values="M3 2h5v0h-5zM16 22h5v0h-5z;M3 2h5v2h-5zM16 22h5v-2h-5z"/></path><path d="M18.5 2h3.5L22 2h-3.5z"><animate fill="freeze" attributeName="d" begin="0.5s" dur="0.4s" values="M18.5 2h3.5L22 2h-3.5z;M18.5 2h3.5L5 22h-3.5z"/></path></g></svg></a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><circle cx="17" cy="7" r="1.5" fill="currentColor" fill-opacity="0"><animate fill="freeze" attributeName="fill-opacity" begin="1.3s" dur="0.15s" values="0;1"/></circle><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="72" stroke-dashoffset="72" d="M16 3c2.76 0 5 2.24 5 5v8c0 2.76 -2.24 5 -5 5h-8c-2.76 0 -5 -2.24 -5 -5v-8c0 -2.76 2.24 -5 5 -5h4Z"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="72;0"/></path><path stroke-dasharray="28" stroke-dashoffset="28" d="M12 8c2.21 0 4 1.79 4 4c0 2.21 -1.79 4 -4 4c-2.21 0 -4 -1.79 -4 -4c0 -2.21 1.79 -4 4 -4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.6s" values="28;0"/></path></g></svg></a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M20.9 2H3.1A1.1 1.1 0 0 0 2 3.1v17.8A1.1 1.1 0 0 0 3.1 22h9.58v-7.75h-2.6v-3h2.6V9a3.64 3.64 0 0 1 3.88-4a20 20 0 0 1 2.33.12v2.7H17.3c-1.26 0-1.5.6-1.5 1.47v1.93h3l-.39 3H15.8V22h5.1a1.1 1.1 0 0 0 1.1-1.1V3.1A1.1 1.1 0 0 0 20.9 2"/></svg></a>
            </div>
            <p>Copyright ©2021 All rights reserved | This template is made with <span>♥</span> by <a href="#">Grihita Haven</a></p>
        </div>
    </footer>
    <script>
       const userprofile = document.getElementById("user-profile");
userprofile.addEventListener('click', () => {
    const profileSettings = document.getElementById("profile-settings");
    
    // Toggle the display property
    if (profileSettings.style.display === "block") {
        profileSettings.style.display = "none";
    } else {
        profileSettings.style.display = "block";
    }
});

    </script>
</body>
</html>
