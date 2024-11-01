
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'doctors');
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO doctor (name, specialty, phone, email) VALUES (?, ?, ?, ?)");
    
    // Check if prepare() failed
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $name, $specialty, $phone, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New doctor added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
    
    // Redirect back to admin page
    header("Location: doctor.php");
    exit();
}
?>
