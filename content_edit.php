<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dog Information</title>
    <link rel="stylesheet" href="dog.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="layout">
        <?php include 'sidebar.php'; ?>
    <div class="container">
        <h1>Add Dog Details</h1>
        <form action="add_dog.php" method="POST" enctype="multipart/form-data">
            <label for="image">Dog Image:</label>
            <input type="file" name="image" id="image" required>
            
            <label for="name">Dog Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="breed">Breed:</label>
            <input type="text" name="breed" id="breed" required>


            <label for="name">Location:</label>
            <input type="text" name="location" id="Location" required>

            <button type="submit">Add Dog</button>
        </form>
    </div>
</body>
</html>
