<?php
session_start();
// Unset all session variables
$_SESSION = array();
// Destroy the session
session_destroy();
// Redirect to login page (or the homepage)
header("Location: index.php"); // Change to your desired redirect page
exit;
?>
