<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css/stl.css">
    <title>Manage Hospital Info</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hospital Information</a>
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
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<style>
   .container {
            margin-top: 50px;
            background: url('images/about-img.jpg') no-repeat center center; /* Add background image */
            background-size: cover; /* Cover the entire container */
            padding: 30px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            opacity: none; /* Slight transparency for better text visibility */
            color:Black;
        }
        .card{
            display:flex;
            
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
    <h2>Admin!</h2>
    <?php
    session_start();
    
    // Database connection parameters
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "admin";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

    // Handle login form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = password_hash('admin123', PASSWORD_DEFAULT);


        $stmt = $conn->prepare("SELECT password_hash FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "<script>alert('Invalid username or password!');</script>";
        }
    }

    // Check if the user is logged in
    $is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
// <?php
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

// Handle form submission for adding/updating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $specialties = $_POST['specialties'];
    $image = $_POST['image'];

    if (isset($_POST['id']) && $_POST['id'] != '') {
        // Update existing hospital
        $id = $_POST['id'];
        $sql = "UPDATE hospitals SET name='$name', location='$location', capacity='$capacity', specialties='$specialties', image='$image' WHERE id='$id'";
    } else {
        // Insert new hospital
        $sql = "INSERT INTO hospitals (name, location, capacity, specialties, image) VALUES ('$name', '$location', '$capacity', '$specialties', '$image')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Hospital record saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM hospitals WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Hospital deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch existing hospitals
$result = $conn->query("SELECT * FROM hospitals");

$conn->close();
?>



<div class="container mt-5">
    <h2>Manage Hospital Information</h2>
    
    <form method="POST" action="">
        <input type="hidden" name="id" id="hospital-id">
        <div class="form-group">
            <label for="name">Hospital Name:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" id="location" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="number" class="form-control" name="capacity" id="capacity" required>
        </div>
        <div class="form-group">
            <label for="specialties">Specialties:</label>
            <input type="text" class="form-control" name="specialties" id="specialties" required>
        </div>
        <div class="form-group">
            <label for="image">Image URL:</label>
            <input type="text" class="form-control" name="image" id="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Hospital</button>
    </form>

    <h3 class="mt-5">Existing Hospitals</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="images/city hospital.jpg" class="card-img-top" alt="Hospital 1">
                <div class="card-body">
                    <h5 class="card-title">City Hospital</h5>
                    <p class="card-text">Location: New York, NY</p>
                    <p class="card-text">Capacity: 300 beds</p>
                    <p class="card-text">Specialties: Cardiology, Neurology, Pediatrics</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="images/green vally.jpg" class="card-img-top" alt="Hospital 2">
                <div class="card-body">
                    <h5 class="card-title">Green Valley Hospital</h5>
                    <p class="card-text">Location: San Francisco, CA</p>
                    <p class="card-text">Capacity: 150 beds</p>
                    <p class="card-text">Specialties: Orthopedics, General Surgery</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <img src="images/lakeside.jpg" class="card-img-top" alt="Hospital 3">
                <div class="card-body">
                    <h5 class="card-title">Lakeside Medical Center</h5>
                    <p class="card-text">Location: Chicago, IL</p>
                    <p class="card-text">Capacity: 200 beds</p>
                    <p class="card-text">Specialties: Oncology, Gynecology</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="row">
    <?php
    // Fetch existing hospitals and display them
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '  <div class="card">';
            echo '    <img src="' . htmlspecialchars($row['image']) . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">';
            echo '    <div class="card-body">';
            echo '      <h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>';
            echo '      <p class="card-text">Location: ' . htmlspecialchars($row['location']) . '</p>';
            echo '      <p class="card-text">Capacity: ' . htmlspecialchars($row['capacity']) . ' beds</p>';
            echo '      <p class="card-text">Specialties: ' . htmlspecialchars($row['specialties']) . '</p>';
            echo '      <a href="#" class="btn btn-warning" onclick="editHospital(' . $row['id'] . ', \'' . htmlspecialchars($row['name']) . '\', \'' . htmlspecialchars($row['location']) . '\', ' . $row['capacity'] . ', \'' . htmlspecialchars($row['specialties']) . '\', \'' . htmlspecialchars($row['image']) . '\')">Edit</a>';
            echo '      <a href="?action=delete&id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this hospital?\');">Delete</a>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
    } else {
        echo '<div class="col-12"><p>No hospitals found.</p></div>';
    }
    ?>
</div>
   
</div>

<script>
function editHospital(id, name, location, capacity, specialties, image) {
    document.getElementById('hospital-id').value = id;
    document.getElementById('name').value = name;
    document.getElementById('location').value = location;
    document.getElementById('capacity').value = capacity;
    document.getElementById('specialties').value = specialties;
    document.getElementById('image').value = image;
}
</script>

</body>
</html>
    
