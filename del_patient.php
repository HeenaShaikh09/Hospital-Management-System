<?php
$servername = "localhost";
$username = "root"; //  DB username
$password = ""; //  DB password
$dbname = "patient"; //  DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get patient ID to delete
$id = $_GET['id'];

$sql = "DELETE FROM patients WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Patient record deleted successfully!'); window.location.href='patient.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
