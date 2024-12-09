<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    
        <div class="login-box">
            <h2>Hello, <span>welcome!</span></h2>
            <form action="login.php" method="post" onsubmit="return validateForm()">
                
                <!-- Email Field -->
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" placeholder="name@mail.com" required>
                
                <!-- Password Field -->
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
                
                <!-- Options Section -->
                <div class="options">
                    <a href="#">Forgot password?</a>
                </div>
                <!-- Buttons -->
                <button type="submit" class="login-btn">Login</button>
                <div class="sign-up">
                    <button type="button" class="signup-btn"><a href="reg.php">Sign up</a></button>
                </div>
                
            </form>  
</div>
        
        <!-- Graphic Section -->
        <aside class="graphic-box">
            <img src="Images/Login.jpg" alt="Login Graphic">
        </aside>
    </div>
    
    <!-- JavaScript -->
    <script src="script.js"></script>
</body>
</html>
