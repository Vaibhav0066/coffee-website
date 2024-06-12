<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="style.css">
  <style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

h1 {
  text-align: center;
  margin-top: 20px;
}

.contact-form, .contact-info {
  display: inline-block;
  vertical-align: top;
  width: 45%;
  padding: 20px;
  margin: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.contact-form label {
  display: block;
  margin-bottom: 5px;
}

.contact-form input, .contact-form textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 15px;
}

.contact-form button {
  background-color: #33b5e5;
}
</style>
</head>
<body>

  <h1>Contact Us</h1>

  <div class="contact-form">

    <?php
      if (isset($_SESSION['message'])) {
        echo "<p class='" . (strpos($_SESSION['message'], 'success') !== false ? 'success' : 'error') . "'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
      }
    ?>

    <form action="process.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="subject">Subject:</label>
      <input type="text" id="subject" name="subject" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </div>

  <div class="contact-info">
    <h2>Contact Information</h2>
    <p>Email: <a href="mailto:contact@yourcompany.com">contact@yourcompany.com</a></p>
    <p>Phone: +1 (555) 555-5555</p>
    <p>Address: 123 Main Street, Anytown, CA 12345</p>
  </div>

</body>
</html>
