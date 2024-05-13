<?php
$servername = "10.1.1.131";
$username = "memappstg";
$password = "Memappstg1!";
// Create connection
$conn = new mysqli($servername, $username, $password,"stg_dhalahor_memapp_db");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

