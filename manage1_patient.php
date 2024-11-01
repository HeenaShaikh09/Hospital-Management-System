<?php
$servername = "localhost";
$username = "root"; //   DB username
$password = ""; //  DB password
$dbname = "patient"; //   DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $medical_history = $_POST['medical_history'];
    $admission_date = $_POST['admission_date'];
    $discharge_date = $_POST['discharge_date'];

    if ($id) {
        // Update existing record
        $sql = "UPDATE patients SET name='$name', dob='$dob', gender='$gender', medical_history='$medical_history', admission_date='$admission_date', discharge_date='$discharge_date' WHERE id=$id";
    } else {
        // Insert new record
        $sql = "INSERT INTO patients (name, dob, gender, medical_history, admission_date, discharge_date, status) VALUES ('$name', '$dob', '$gender', '$medical_history', '$admission_date', '$discharge_date', 'admitted')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Patient record saved successfully!'); window.location.href='patient.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
