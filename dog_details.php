<?php
$conn = new mysqli("localhost", "root", "", "grihita_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and retrieve the dog ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $dogId = intval($_GET['id']);
    
    // Fetch dog details from the database
    $sql = "SELECT * FROM dogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dogId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $dog = $result->fetch_assoc();
    } else {
        echo "Dog not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<?php include 'navbar.php'; ?>
    <!-- Dog Details Section -->
    <div class="d_container">
        <img class="dog-image" src="<?php echo $dog['image_location']; ?>" alt="Dog Image">
        <div class="dog-details">
            <h2><?php echo htmlspecialchars($dog['name']); ?></h2>
            <p><strong>Breed:</strong> <?php echo htmlspecialchars($dog['breed']); ?></p>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($dog['location']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($dog['description']); ?></p>
            <a href="adopt.php?id=<?php echo $dog['id']; ?>" class="btn">Adopt Now</a>
        </div>
    </div>

    <!-- View More Button -->
<div class="view-more-container">
    <a href="Dog.php" class="view-more-btn">View More Dogs</a>
</div>
    <!-- Footer Section -->
<footer>
        <div class="footer-content">
            <h1>Grihita Haven</h1>
            <ul class="footer-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dogs</a></li>
                <li><a href="#">About</a></li>
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
<!-- <?php
$conn->close();
?> -->
