<?php
session_start();
$host = 'localhost';
$db = 'appointment';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'] ?? 1; // 
$details = $_POST['details'] ?? '';

if (!empty($details)) {
    $stmt = $conn->prepare("INSERT INTO appoint (user_id, appointment_details) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $details);
    if ($stmt->execute()) {
        echo htmlspecialchars($details); // Return the new appointment details
    } else {
        http_response_code(500);
        echo "Error scheduling appointment";
    }
    $stmt->close();
}

$conn->close();
?>
