<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Brews Coffee</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php include 'header.php'; ?>
  <main>
    <section class="hero">
      <h2>Start Your Day with a Fresh Cup</h2>
      <p>Explore our wide selection of premium coffee beans and expertly crafted blends.</p>
      <a href="shop.php">Shop Now</a>
    </section>
    
     <center> <h2>Our Featured Coffees</h2><br></center>
     <section class="products">
    <?php
        // Connect to your database (replace with your connection details)
        $conn = mysqli_connect("localhost", "root", "", "kapetown");

        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Write a query to fetch featured products (replace with your table structure)
        $sql = "SELECT id, name, image, price FROM products WHERE featured = 1";
        $result = mysqli_query($conn, $sql);

        // Loop through results and display products
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product'>";
            echo "<img src='image/" . $row["image"] . "' alt='" . $row["name"] . "'>";
            echo "<h3>" . $row["name"] . "</h3>";
            echo "<p>$" . $row["price"] . "</p>";
            echo "<a href='product.php?id=" . $row["id"] . "'>Learn More</a>";
            echo "</div>";
          }
        } else {
          echo "No featured products found.";
        }

        mysqli_close($conn);
      ?>
       <?php
    if (isset($_GET['message'])) {
      echo "<p class='message'>" . $_GET['message'] . "</p>";
    }
    ?>
    </section>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
