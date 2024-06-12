<?php
session_start();

if (!isset($_SESSION['message'])) {
  header("Location: home.php");  // Redirect if no order message exists
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Success</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h1>Order Success</h1>

  <?php if (isset($_SESSION['message'])) : ?>
    <p><?php echo $_SESSION['message'];
      unset($_SESSION['message']); // Clear message after displaying
    ?></p>
  <?php endif; ?>

  <p>Thank you for your order! We will process your order shortly and send you a confirmation email with additional details.</p>

  <p>You may also view your order details by logging into your account (if applicable).</p>

  <a href="home.php">Continue Shopping</a>

</body>
</html>
