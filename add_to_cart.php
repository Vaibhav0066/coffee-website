<?php
session_start();
require_once("db_connect.php");

// Check if product ID and quantity are set in the form submission
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
  $product_id = (int)$_POST['product_id']; // Cast to integer for security
  $quantity = (int)$_POST['quantity']; // Cast to integer for security

  // Validate quantity (optional)
  if ($quantity < 1) {
    $message = "Invalid quantity. Please enter a quantity greater than 0.";
    header("Location: product_details.php?id=$product_id&message=" . urlencode($message));
    exit();
  }

  // Access database to check product availability (assuming connection is established)
  $sql = "SELECT * FROM products WHERE id = $product_id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Check if product exists in the cart (optional)
    if (isset($_SESSION['cart'][$product_id])) {
      // Update quantity if product already exists
      $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
      // Add product to cart
      $_SESSION['cart'][$product_id] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'price' => $row['price'],
        'quantity' => $quantity,
      );
    }

    // Success message (optional)
    $message = "Product added to cart successfully!";
    header("Location: cart.php?id=$product_id&message=" . urlencode($message));
    exit();
  } else {
    // Error message if product not found
    $message = "Product not found in database.";
    header("Location: product.php?id=$product_id&message=" . urlencode($message));
    exit();
  }
} else {
  // Error message for missing data
  $message = "Missing product ID or quantity. Please try again.";
  header("Location: product.php?id=" . $_POST['product_id'] . "&message=" . urlencode($message));
  exit();
}
?>
