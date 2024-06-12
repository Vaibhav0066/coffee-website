<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="style.css">
  <style>
/* Basic styles */

body {
  font-family: Arial, sans-serif; /* Specify a fallback font */
  margin: 0;
  padding: 0;
  color: #333; /* Set a base text color */
}

h1, h2, h3 {
  margin: 1.5em 0;
  font-weight: bold; /* Add some weight to headings */
}

p {
  line-height: 1.5;
  margin-bottom: 1em;
}

ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

ul li {
  margin-bottom: 10px;
}

img {
  max-width: 100%;
  height: auto;
}

a {
  color: #33b5e5; /* Set a link color */
  text-decoration: none; /* Remove underline on hover */
}

a:hover {
  text-decoration: underline; /* Add underline on hover */
}

/* Media queries for responsive design (optional) */

@media only screen and (max-width: 768px) {
  /* Adjust styles for smaller screens */
  .about-content {
    width: 90%;
  }
  .team-member {
    margin: 5px;
  }
}

.about-content {
  max-width: 800px;
  margin: 40px auto; /* Add some top and bottom margin */
  padding: 20px;
  background-color: #f5f5f5; /* Add a light background */
  border-radius: 5px; /* Add rounded corners */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
}

.about-content h2 {
  margin-top: 0; /* Remove top margin for the first h2 */
}

  </style>
</head>
<body>
<?php include 'header.php'; ?>
  <h1>About Us</h1>

  <div class="about-content">

    <?php
      // Dynamically load "about_us.txt" content
      $aboutUsContent = file_get_contents("about.txt");
      echo $aboutUsContent;
    ?>

    <p>We are a passionate team dedicated to maximum profit.</p>

    <h2>Our Values</h2>

    <ul>
      <li>Quality</li>
      <li>Innovation</li>
      <li>Customer Satisfaction</li>
      <li>Sustainability (optional)</li>
    </ul>

    <h2>Meet the Team (optional)</h2>

    <?php
      // You can add code here to dynamically display team member information
      // from a database or a separate file. Here's a placeholder example:
      $teamMembers = array(
        array("name" => "Rohit Kumar", "title" => "CEO", "image" => "image/vaibhav.png"),
        array("name" => "Vaibhav", "title" => "Marketing Manager", "image" => "image/vaibhav.png"),
        // Add more team members here
      );

      foreach ($teamMembers as $member) {
        echo "<div class='team-member'>";
        echo "<img src='" . $member['image'] . "' alt='" . $member['name'] . "'>";
        echo "<h3>" . $member['name'] . "</h3>";
        echo "<p>" . $member['title'] . "</p>";
        echo "</div>";
      }
    ?>
  </div>
<?php include 'footer.php'; ?>
</body>
</html>
