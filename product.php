<link rel="stylesheet" href="style.css">

<?php
session_start();

// Include database connection file (replace with your details)
require_once("db_connect.php");

// Get product ID from URL parameter
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Check if product ID is valid
if ($product_id <= 0) {
  echo "Invalid product ID.";
  exit;
}
// Fetch product details from database
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  $product = mysqli_fetch_assoc($result);

  // Display product details
  echo "<h1>" . $product['name'] . "</h1>";
  echo "<img src= '"."image/" .$product['image'] . "' alt='" . $product['name'] . "'>";
  echo "<p>Price: $" . number_format($product['price'], 2) . "</p>";
  echo "<p>Description: " . $product['description'] . "</p>";

  // Add to Cart form (optional)
  if (isset($_SESSION['user_id'])) { // Check if user is logged in (optional)
    ?>
    <form action="add_to_cart.php" method="post">
      <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
      <label for="quantity">Quantity:</label>
      <input type="number" name="quantity" min="1" value="1" required>
      <button type="submit" >Add to Cart</button>
    </form>
    <?php
  } else {
    echo "<p>Please log in to add to cart.</p>";
  }
} else {
  echo "Product not found.";
}

mysqli_close($conn);
?>
