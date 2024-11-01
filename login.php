<?php 
include("conn.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start the session

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // SQL query
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $count = mysqli_num_rows($result);  

    if ($count == 1) {
       
        if ($result->num_rows > 0) {
            // Set session variable
            $_SESSION['username'] = $user;
            header("Location: udashboard.php"); // Redirect to page
            exit();
        } else {
            echo "Invalid username or password.";
        }

        
}
}

$conn->close();  
?>

