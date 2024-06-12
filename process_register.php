<?php
session_start();

// Include database connection file (replace with your details)
require_once("db_connect.php");

// Function to check if username or email already exists
function user_exists($username, $email) {
  global $conn; // Access global database connection
  $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
  $result = mysqli_query($conn, $sql);
  return (mysqli_num_rows($result) > 0);
}

// Validate user input
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Check if passwords match
  if ($password !== $confirm_password) {
    echo "Password confirmation does not match.";
    exit();
  }

  // Check if username or email already exists
  if (user_exists($username, $email)) {
    echo "Username or email already exists.";
    exit();
  }

  // Hash the password before storing
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert user data into database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Registration successful (send confirmation email - optional)
    echo "Registration successful! Please check your email for confirmation.";
    header('Location:login.php');
    // Redirect to login page or account dashboard
  } else {
    echo "Registration failed. Please try again.";
  }

  mysqli_close($conn);
} else {
  echo "Missing registration data.";
}
?>
