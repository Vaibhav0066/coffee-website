<?php

$servername = "localhost"; // Replace with your database hostname
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "kapetown"; // Replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Set character encoding (optional, adjust based on your database)
mysqli_set_charset($conn, "utf8");

?>
