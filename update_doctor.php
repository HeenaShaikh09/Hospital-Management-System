<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctors</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'doctors');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch existing doctor information
    $stmt = $conn->prepare("SELECT * FROM doctor WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $doctor = $result->fetch_assoc();

    if (!$doctor) {
        echo "Doctor not found.";
        exit();
    }
} else {
    echo "No doctor ID specified.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Update doctor information
    $stmt = $conn->prepare("UPDATE doctor SET name=?, specialty=?, phone=?, email=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $specialty, $phone, $email, $id); // Changed to match the table name

    if ($stmt->execute()) {
        header("Location: view_doctors.php");
        exit();
    } else {
        echo "Error updating doctor: " . $stmt->error; // Display the error
    }

    $stmt->close();
    $conn->close();
}
?>

<body>
<style>
    body {
        background-color: #f8f9fa; /* Light background color */
    }
    .container {
        margin-top: 50px;
        background-color: #ffffff; /* White background for the container */
        padding: 30px;
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }
    h2 {
        margin-bottom: 30px;
        text-align: center; /* Center align the header */
    }
    .form-label {
        font-weight: bold; /* Bold labels */
    }
    .btn-primary {
        background-color: #007bff; /* Custom button color */
        border-color: #007bff; /* Custom border color */
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }
    .back-btn {
        margin-top: 20px; /* Space above the button */
        text-align: center; /* Center align back button */
    }
</style>

<div class="container mt-4">
    <h2>Update Doctor</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $id); ?>">
        <div class="mb-3">
            <label for="doctorName" class="form-label">Name</label>
            <input type="text" class="form-control" id="doctorName" name="name" value="<?php echo htmlspecialchars($doctor['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Specialty</label>
            <input type="text" class="form-control" id="specialty" name="specialty" value="<?php echo htmlspecialchars($doctor['specialty']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($doctor['phone']); ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($doctor['email']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Doctor</button>
    </form>
    <a href="view_doctors.php" class="btn btn-secondary mt-3">Back to List</a>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
