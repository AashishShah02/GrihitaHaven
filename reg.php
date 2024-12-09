<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="./Images/Registerdog.png" alt="Dog and Owner" class="image">
        </div>
        <div class="form-section">
            <h2>Get Started</h2>
            <p>It’s easy and convenient – create a single account to access all platforms.</p>
            <form id="sign-up-form" action="registerlogic.php" method="post">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="Username">Username</label>
                <input type="text" id="Username" name="username" placeholder="Enter your Username" required>

                <label for="pw">Password</label>
                <input type="password" id="pw" name="password" placeholder="Enter your password" required>

                <button type="submit" id="continue-btn" disabled>Register</button>
            </form>
            <p>Already have an account? <a href="hi.php">Log In</a></p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
