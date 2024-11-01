<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Appointment</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css/stl.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .container-fluid{
    background-color: #56b9a2;
}


.navbar-expand-lg .navbar-collapse {
    display: flex !important;
    flex-basis: auto;
    background-color: #56b9a2;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Appointment</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Admin
          </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="admin.php">Admin</a></li>
            <li><a class="dropdown-item" href="#">Doctor</a></li>
            <li><a class="dropdown-item" href="#">User</a></li>
          

          </ul>
         
        </li>
      </ul>
    </div>
   
  </div>
</nav>

<div class="container">
    <h2>Make an Appointment</h2>
    <form action="appointment.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="appointment_date">Appointment Date & Time:</label>
            <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Confirm Appointment</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $appointment_date = $_POST['appointment_date'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'appointment_db');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO appointments (patient_name, email, appointment_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $appointment_date);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success mt-3'>Appointment confirmed! Please proceed to payment.</div>";
        //  integrate with a payment gateway, e.g., Stripe, PayPal, etc.
        // For example:
        // header('Location: payment.php?id=' . $stmt->insert_id);
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<a href='payment.php?id=" . $appointmentId . "' class='btn btn-primary mt-2'>Proceed to Payment</a>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
