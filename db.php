<?php
$servername = "localhost"; // Your database server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "grihita_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Error connecting to daatabase");
}
?>