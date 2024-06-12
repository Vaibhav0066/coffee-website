<?php
session_start();

// Check if user has items in cart before proceeding
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
  header("Location: shop.php?message=" . urlencode("Your cart is empty. Please add products to checkout."));
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="stylesheet" href="style.css"> </head>
<body>

  <h1>Checkout</h1>

  <?php if (isset($_SESSION['message'])) : ?>
    <div class="message">
      <?php echo $_SESSION['message'];
        unset($_SESSION['message']); // Clear message after displaying
      ?>
    </div>
  <?php endif; ?>

  <form action="process_order.php" method="post">
    <h2>Billing Information</h2>
    <div class="form-group">
      <label for="name">Full Name:</label>
      <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email Address:</label>
      <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" name="address" id="address" required>
    </div>
    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" name="city" id="city" required>
    </div>
    <div class="form-group">
      <label for="state">State:</label>
      <input type="text" name="state" id="state" required>
    </div>
    <div class="form-group">
      <label for="zip">Zip Code:</label>
      <input type="text" name="zip" id="zip" required>
    </div>

    <h2>Shipping Information (Optional)</h2>
    <div class="form-group">
      <input type="checkbox" name="same_as_billing" id="same_as_billing">
      <label for="same_as_billing">Same as Billing Information</label>
    </div>
    <div class="shipping-info" style="display: none;"> <div class="form-group">
        <label for="shipping_name">Full Name:</label>
        <input type="text" name="shipping_name" id="shipping_name">
      </div>
      <div class="form-group">
        <label for="shipping_email">Email Address:</label>
        <input type="email" name="shipping_email" id="shipping_email">
      </div>
      <div class="form-group">
        <label for="shipping_address">Address:</label>
        <input type="text" name="shipping_address" id="shipping_address">
      </div>
      <div class="form-group">
        <label for="shipping_city">City:</label>
        <input type="text" name="shipping_city" id="shipping_city">
      </div>
      <div class="form-group">
        <label for="shipping_state">State:</label>
        <input type="text" name="shipping_state" id="shipping_state">
      </div>
      <div class="form-group">
        <label for="shipping_zip">Zip Code:</label>
        <input type="text" name="shipping_zip" id="shipping_zip">
      </div>
    </div>

    <h2>Your Order</h2>
    <table class="cart-table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($_SESSION['cart'] as $item) : ?>
          <tr>
            <td><?php echo $item['name']; ?></td>
            <td>$<?php echo number_format($item['price'], 2); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="3">Total</th>
          <th>$<?php
          $total = 0;
          foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
          }
          echo number_format($total, 2);
          ?></th>
        </tr>
      </tfoot>
    </table>

    <div class="form-group">
      <label for="payment_method">Payment Method:</label>
      <select name="payment_method" id="payment_method" required>
        <option value="credit_card">Credit Card</option>
        <option value="debit_card">Debit Card</option>
        <option value="paypal">PayPal</option>
        </select>
    </div>

    <div class="payment-details" style="display: none;">
      </div>

    <button type="submit">Place Order</button>
  </form>

</body>
</html>
