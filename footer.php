<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Brews Coffee</title>
    <style> /* Footer styles */

footer {
  background-color: #f1f1f1;
  padding: 30px 0;
  text-align: center; /* Remove if you want left-aligned content */
}

.footer-container {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap; /* Allow sections to wrap on smaller screens */
 margin: 0 auto; /* Center the container horizontally */
}

.footer-section {
  flex: 1 0 15%; /* Responsive sizing for sections */
  padding: 15px;
}

.footer-section h3 {
  margin-bottom: 10px;
  font-size: 1.1em;
  color: #333;
}

.footer-section p {
  line-height: 1.5;
  font-size: 0.9em;
  color: #666;
}

.footer-section a {
  color: #007bff; /* Brand blue color */
  text-decoration: none;
  transition: all 0.2s ease-in-out;
}

.footer-section a:hover {
  color: #0056b3; /* Darker blue on hover */
}

.social-icons {
  display: flex;
  justify-content: space-between;
  margin-top: 15px;
}

.social-icons li {
  list-style: none;
}

.social-icons li a {
  color: #333;
  font-size: 1.2em;
  transition: all 0.2s ease-in-out;
}

.social-icons li a:hover {
  color: #007bff;
}

.copyright {
  background-color: #e0e0e0;
  padding: 10px 0;
  color: #666;
}

.copyright p {
  margin: 0;
}
</style>
</head>
<body>
<footer>
  <div class="footer-container">
    <div class="footer-section">
      <h3>About Us</h3>
      <p>
      Fresh Brews Coffee is your one-stop shop for premium coffee beans, expertly crafted blends, and all things coffee. We offer a wide selection of freshly roasted beans, flavorful ground coffee, and convenient brewing options. Explore our online store or visit our cafe to discover your perfect cup.      </p>
      <a href="about.php">Learn More</a>
    </div>
    <div class="footer-section">
      <h3>Contact Us</h3>
      <p>
        Amity University Rajasthan<br>
        9671406811<br>
        coffee@examplepetstore.com
      </p>
      <a href="contact.php">Get In Touch</a>
    </dive>
    <div class="footer-section">
      <h3>Follow Us</h3>
      <ul class="social-icons">
        <li>
          <a href="#">
            <i class="fa fa-facebook">Facebook</i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-twitter">Twitter</i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-instagram">Instagram</i>
          </a>
        </li>
        </ul>
    </div>
    <div class="footer-section">
      <h3>Newsletter Signup</h3>
      <form action="subscribe.php" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </div>
  <div class="copyright">
    <p>&copy; <?php echo date("Y"); ?> Fresh Brews Coffee. All Rights Reserved.</p>
  </div>
</footer>
</body>
</html>