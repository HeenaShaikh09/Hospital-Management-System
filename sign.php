<?php
$servername = "localhost";
$username = "root"; //  database username
$password = ""; //  database password
$dbname = "user"; //  database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $stmt->bind_param("ss", $user, $pass);
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "New record created successfully.";
        header("Location: signup.php"); // Redirect back to the form
        exit();
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
        header("Location: signup.php");
        exit();
    }

    $stmt->close();
} else {
    $_SESSION['error_message'] = "All fields are required.";
    header("Location:  Signup.php");
    exit();
}


$conn->close();
?>