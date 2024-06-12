<?php

require_once 'db_connect.php';

// Check if form is submitted and required data is present
if (isset($_POST['name'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['payment_method'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $payment_method = $_POST['payment_method'];

  // Validate user input (optional, improve based on your needs)
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid email address.";
    goto error; // Jump to error handling
  }

  // Process order details
  $total = 0;
  foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
  }

  $order_details = array(
    "customer_name" => $name,
    "customer_email" => $email,
    "shipping_address" => "$address, $city, $state, $zip",
    "payment_method" => $payment_method,
    "total_amount" => $total,
  );


  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare SQL statement to insert order data
  $sql = "INSERT INTO orders (customer_name, customer_email, shipping_address, payment_method, total_amount) VALUES (?, ?, ?, ?, ?)";

  // Prepare the statement
  $stmt = $conn->prepare($sql);

  // Bind values to prepared statement (prevents SQL injection)
  $stmt->bind_param("sssss", $order_details["customer_name"], $order_details["customer_email"], $order_details["shipping_address"], $order_details["payment_method"], $order_details["total_amount"]);

  // Execute the statement
  if ($stmt->execute()) {
    $order_id = $conn->insert_id; // Get the last inserted order ID

    // Insert individual cart items into a separate table (optional)
    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) {
        $product_id = $item['id']; // Replace with actual product ID retrieval logic
        $quantity = $item['quantity'];
        $price = $item['price'];

        $sql_item = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt_item = $conn->prepare($sql_item);
        $stmt_item->bind_param("iiii", $order_id, $product_id, $quantity, $price);
        $stmt_item->execute();
        $stmt_item->close();
      }
    }

    // Clear cart session and redirect to success page
    unset($_SESSION['cart']);
    header("Location: order_success.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();

error:
  // Handle errors (optional, display error message and redirect back to checkout)
  $_SESSION['message'] = $message;
  header("Location: checkout.php");
  exit();
} else {
  // Redirect back to checkout if form data is missing
  header("Location: checkout.php?message=" . urlencode("Missing required information. Please try again."));
  exit();
}
?>
