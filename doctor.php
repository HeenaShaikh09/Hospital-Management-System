<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css/stl.css">
    <title>Admin Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Manage Doctor</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="doctor.php">Doctor</a></li>
        <li class="nav-item"><a class="nav-link" href="patient.php">Patient</a></li>
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
          <li class="nav-item"><a class="nav-link" href="logout.php">Log-out</a></li>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
    .card{
    background-color: lightyellow;
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

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Doctor
                </div>
                <div class="card-body">
                    <form method="POST" action="add_doctor.php">
                        <div class="mb-3">
                            <label for="doctorName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="doctorName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="specialty" class="form-label">Specialty</label>
                            <input type="text" class="form-control" id="specialty" name="specialty" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Doctor</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    View Doctors
                </div>
                <div class="card-body">
                    <a href="view_doctors.php" class="btn btn-info">View Doctors</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Update Doctor Info
                </div>
                <div class="card-body">
                    <a href="update_doctor.php" class="btn btn-warning">Update Doctor</a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mt-4">
    <h2>Doctor List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'doctors');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO doctors (name, specialty, phone, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $specialty, $phone, $email);

    if ($stmt->execute()) {
        echo "New doctor added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    // Redirect back to admin page
    header("Location: doctor.php");
    exit();
}
?>

        </tbody>
    </table>
    <a href="doctor.php" class="btn btn-secondary">Back to Admin</a>
</div>

