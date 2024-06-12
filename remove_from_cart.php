<?php
session_start();

if (isset($_SESSION['cart']) && isset($_POST['id'])) {
  $product_id = $_POST['id'];

  // Unset the product from the cart session
  unset($_SESSION['cart'][$product_id]);

  // Redirect back to the cart page
  header("Location: cart.php");
  exit();
} else {
  // Error handling (missing data)
  echo "Error removing item from cart!";
}
?>
