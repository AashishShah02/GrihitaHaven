
 <html>
    <style>
/* Dog Container Styling */
.dog-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

/* Dog Card Styling */
.dog-card {
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #fff;
  padding: 15px;
  width: 250px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
  text-align: center;
}

.dog-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.dog-card img {
  max-width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 10px;
}

.dog-card h3 {
  font-size: 20px;
  margin: 10px 0 5px;
  color: #555;
}

.dog-card p {
  font-size: 14px;
  color: #777;
  margin: 5px 0;
}

/* Button Styling */
.dog-card .btn {
  display: inline-block;
  padding: 8px 16px;
  font-size: 14px;
  color: #fff;
  background-color: #28a745;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 10px;
  text-transform: uppercase;
  transition: background-color 0.3s;
}

.dog-card .btn:hover {
  background-color: #218838;
}

/* View More Button */
.view-more-btn {
  text-align: center;
  display: inline-block;
  margin: 20px 650px;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  font-size: 16px;
  transition: background-color 0.3s;
}

.view-more-btn:hover {
  background-color: #0056b3;
}

    </style>
<section class="recently-added">
  <div class="dog-container">
    <?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "grihita_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM dogs ORDER BY id DESC LIMIT 5;";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
          <form action="" method="post">
            <a href="dog_details.php?id=<?= $row['id']; ?>">
              <div class="dog-card">
                <img src="<?= $row['image_location'] ?>" alt="Dog Image">
                <div class="details">
                  <h3><?= $row['name']; ?></h3>
                  <p>Breed: <?= $row['breed']; ?></p>
                  <p>📍 <?= $row['location']; ?></p>
                  <input type="hidden" name="dog_id" value="<?= $row['id']; ?>">
                  <input type="hidden" name="dog_name" value="<?= $row['name']; ?>">
                  <input type="hidden" name="dog_breed" value="<?= $row['breed']; ?>">
                  <input type="hidden" name="dog_image" value="<?= $row['image_location']; ?>">
                  <!-- <input type="submit" class="btn" value="Adopt Now" name="adopt_dog"> -->
                </div>
              </div>
            </a>
          </form>
    <?php
        }
    } else {
        echo "<p>No dogs found.</p>";
    }

    $conn->close();
    ?>
  </div>
  <span>
    <a href="Dog.php" class="view-more-btn">View More</a>
  </span>
</section>
</html>
