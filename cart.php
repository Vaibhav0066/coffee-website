<?php
session_start();

if (isset($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];
  $total_price = 0;
?>

<?php
// ... existing cart display code ...

// Check for success or error message in URL parameters
if (isset($_GET['message'])) {
  $message = $_GET['message'];
  echo "<p>$message</p>"; // Display message
}

// ... remaining cart code ...
?>

  <h1>Your Shopping Cart</h1>
  <table border="1">
    <thead>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($cart as $product_id => $product) : ?>
      <tr>
        <td><?php echo $product['name']; ?></td>
        <td>
          <form action="update_cart.php" method="post">
            <input type="hidden" name="id" value="<?php echo $product_id; ?>">
            <input type="number" name="quantity" min="1" value="<?php echo $product['quantity']; ?>" style="width: 30px;">
            <button type="submit">Update</button>
          </form>
        </td>
        <td>$<?php echo number_format($product['price'], 2); ?></td>
        <td>$<?php 
          $subtotal = $product['price'] * $product['quantity'];
          echo number_format($subtotal, 2);
          $total_price += $subtotal; 
        ?></td>
        <td>
          <form action="remove_from_cart.php" method="post">
            <input type="hidden" name="id" value="<?php echo $product_id; ?>">
            <button type="submit">Remove</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
      <tr>
        <td colspan="3">Total:</td>
        <td colspan="2">$<?php echo number_format($total_price, 2); ?></td>
      </tr>
    </tbody>
  </table>
  <a href="checkout.php">Proceed to Checkout</a>  <?php
} else {
  echo "Your cart is empty!";
}
?>
