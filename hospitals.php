<?php
// Database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "hospital_info";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch hospital data
$sql = "SELECT * FROM hospitals";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css/stl.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Hospital Management System</h2>
    
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4">';
                echo '  <div class="card mb-4">';
                echo '    <img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                echo '    <div class="card-body">';
                echo '      <h5 class="card-title">' . $row['name'] . '</h5>';
                echo '      <p class="card-text">Location: ' . $row['location'] . '</p>';
                echo '      <p class="card-text">Capacity: ' . $row['capacity'] . ' beds</p>';
                echo '      <p class="card-text">Specialties: ' . $row['specialties'] . '</p>';
                echo '      <a href="#" class="btn btn-primary">View Details</a>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12"><p>No hospitals found.</p></div>';
        }
        $conn->close();
        ?>
    </div>
</div>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
