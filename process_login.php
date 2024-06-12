<?php
session_start();

// Include database connection file (replace with your details)
require_once("db_connect.php");

// Function to verify user credentials
function verify_user($username_email, $password) {
  global $conn; // Access global database connection
  $sql = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
      return $user; // Return user data if password matches
    }
  }
  return false;
}

// Validate user input
if (isset($_POST['username_email']) && isset($_POST['password'])) {
  $username_email = trim($_POST['username_email']);
  $password = $_POST['password'];

  // Verify user credentials
  $user = verify_user($username_email, $password);

  if ($user) {
    // Login successful
    $_SESSION['user_id'] = $user['id']; // Store user ID in session
    header("Location: home.php"); // Redirect to account dashboard
    exit();
  } else {
    echo "Invalid username or password.";
  }

  mysqli_close($conn);
} else {
  echo "Missing login data.";
}
?>
