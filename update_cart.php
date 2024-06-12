<?php
session_start();

if (isset($_SESSION['cart']) && isset($_POST['id']) && isset($_POST['quantity'])) {
  $product_id = $_POST['id'];
  $quantity = (int)$_GET['quantity']; // Cast to integer for security (should be $_POST)

  // Update cart quantity in the session
  $_SESSION['cart'][$product_id]['quantity'] = $quantity;

  // Redirect back to the cart page
  header("Location: cart.php");
  exit();
} else {
  // Error handling (missing data)
  echo "Error updating cart!";
}
?>
