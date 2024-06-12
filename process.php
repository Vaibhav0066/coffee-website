<?php
session_start();

// Validate and sanitize user input (improve based on your needs)
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Replace with your actual email address (consider using a contact form service)
$to = 'flyinghacker1@gmail.com';

// Construct email content
$body = "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Subject: $subject\n";
$body .= "Message:\n$message";

// Send email using mail function (or consider SMTP libraries for more security)
if (mail($to, $subject, $body)) {
  $_SESSION['message'] = 'Your message has been sent successfully.';
} else {
  $_SESSION['message'] = 'Error sending message. Please try again later.';
}

// Redirect back to contact page
header("Location: home.php");
exit();
