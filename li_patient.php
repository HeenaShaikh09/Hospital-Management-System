<?php
$servername = "localhost";
$username = "root"; //  DB username
$password = ""; //  DB password
$dbname = "patient"; // r DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patients
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['medical_history']}</td>
                <td>{$row['admission_date']}</td>
                <td>{$row['discharge_date']}</td>
                <td>
                    <button class='btn btn-warning' onclick=\"editPatient({$row['id']}, '{$row['name']}', '{$row['dob']}', '{$row['gender']}', '{$row['medical_history']}', '{$row['admission_date']}', '{$row['discharge_date']}')\">Edit</button>
                    <a href='del_patient.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No records found</td></tr>";
}

$conn->close();
?>
