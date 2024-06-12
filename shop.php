<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <link rel="stylesheet" href="shop.css">
</head>
<body> 
  <?php include 'header.php'; ?>
<center>
<?php
session_start();

// Include database connection file (replace with your details)
require_once("db_connect.php");


// Define the number of products per page (optional, adjust for pagination)
$products_per_page = 6;

// Get the current page number from URL parameter (optional for pagination)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for pagination (optional)
$offset = ($page - 1) * $products_per_page;

// Fetch all products from database (adjust query based on your table structure)
$sql = "SELECT * FROM products LIMIT $products_per_page OFFSET $offset";
$result = mysqli_query($conn, $sql);

// Display products
if (mysqli_num_rows($result) > 0) {
  echo "<h2>All Products</h2>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='product'>";
    echo "<a href='product_details.php?id=" . $row['id'] . "'>";
    echo "<img src='image/" . $row['image'] . "' alt='" . $row['name'] . "'>";
    echo "</a>";
    echo "<h3>" . $row['name'] . "</h3>";
    echo "<p>$" . number_format($row['price'], 2) . "</p>";
    // Add to cart form (optional)
    if (isset($_SESSION['user_id'])) { // Check if user is logged in (optional)
      echo "<form action='add_to_cart.php' method='post'>";
      echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
      echo "<button type='submit'>Add to Cart</button>";
      echo "</form>";
    }
    echo "</div>";
  }
} else {
  echo "No products found.";
}

// Pagination (optional)
if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products")) > $products_per_page) {
  $total_pages = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products")) / $products_per_page);
  echo "<ul class='pagination'>";
  if ($page > 1) {
    echo "<li><a href='shop.php?page=" . ($page - 1) . "'>Previous</a></li>";
  }
  for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
      echo "<li class='active'><a href='shop.php?page=$i'>$i</a></li>";
    } else {
      echo "<li><a href='shop.php?page=$i'>$i</a></li>";
    }
  }
  if ($page < $total_pages) {
    echo "<li><a href='shop.php?page=" . ($page + 1) . "'>Next</a></li>";
  }
  echo "</ul>";
}

mysqli_close($conn);
?>
</center>
<?php include 'footer.php'; ?>
</body>
</html>