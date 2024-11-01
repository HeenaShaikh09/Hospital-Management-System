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
    <a class="navbar-brand" href="#">Patient Information Management</a>
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
   

    .container {
        margin-top: 20px;
        background-color: lightblue;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    h3 {
        margin-top: 30px;
        color: #333;
    }

    .form-group label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    table {
        margin-top: 20px;
    }

    th {
        background-color: #007bff;
        color: white;
        padding: 10px;
    }

    td {
        padding: 10px;
        vertical-align: middle;
    }

    .btn-warning, .btn-danger {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }
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

    <div class="container mt-5">
        <h2>Patient Information Management</h2>
        <form action="manage1_patient.php" method="POST">
            <input type="hidden" name="id" id="patient_id" value="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="medical_history">Medical History</label>
                <textarea class="form-control" id="medical_history" name="medical_history" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="admission_date">Admission Date</label>
                <input type="date" class="form-control" id="admission_date" name="admission_date">
            </div>
            <div class="form-group">
                <label for="discharge_date">Discharge Date</label>
                <input type="date" class="form-control" id="discharge_date" name="discharge_date">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <hr>

        <h3>Patient Records</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Medical History</th>
                    <th>Admission Date</th>
                    <th>Discharge Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'li_patient.php'; ?>
            </tbody>
        </table>
    </div>

    <script>
        function editPatient(id, name, dob, gender, medical_history, admission_date, discharge_date) {
            document.getElementById('patient_id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('dob').value = dob;
            document.getElementById('gender').value = gender;
            document.getElementById('medical_history').value = medical_history;
            document.getElementById('admission_date').value = admission_date;
            document.getElementById('discharge_date').value = discharge_date;
        }
    </script>
</body>
</html>
