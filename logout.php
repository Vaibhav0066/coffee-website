<?php
session_start();

// Destroy the user session
session_destroy();

// Redirect to the homepage with a success message (optional)
header("Location: index.php?message=Successfully+logged+out");
exit();
?>
