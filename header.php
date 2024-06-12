<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Brews Coffee</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<header>
    <nav>
    <h1>Fresh Brews Coffee</h1>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <?php
        // Check if user is logged in (optional)
        if (isset($_SESSION['user_id'])) {
          echo '<li><a href="account.php">Account</a></li>';
          echo '<li><a href="logout.php">Logout</a></li>';
        } else {
          echo '<li><a href="register.php">Register</a></li>';
          echo '<li><a href="index.php">Login</a></li>';
        }
        ?>
        <?php if (isset($_SESSION['cart'])) : ?>
          <li><a href="cart.php">Cart (<?php echo count($_SESSION['cart']); ?>)</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>
</body>
</html>
