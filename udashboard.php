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

// Assume $user_id is set from the session
$user_id = $_SESSION['user_id'] ?? 1; // Replace with your session logic

// Fetch appointment history
function fetchAppointments($conn, $user_id) {
    $stmt = $conn->prepare("SELECT appointment_details FROM appoint WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $appointments = [];
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row['appointment_details'];
    }
    $stmt->close();
    return $appointments;
}

$appointments = fetchAppointments($conn, $user_id);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #343a40;
        }

        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        h1, h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background: #e9ecef;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        ul li:hover {
            background: #ced4da;
        }

        .btn {
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 5px;
        }

        .alert {
            margin-top: 15px;
        }
    </style>
</head>

    <div class="container mt-5">
        <h1>Welcome to Your Dashboard</h1>
        <h2>Available Tests</h2>
        <ul>
            <li>Blood Test</li>
            <li>X-Ray</li>
            <li>MRI Scan</li>
        </ul>

        <h2>Your Appointment History</h2>
        <ul id="appointment-list">
            <?php foreach ($appointments as $appointment): ?>
                <li><?php echo htmlspecialchars($appointment); ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Update Appointment Done</h2>
        <form id="appointment-form">
            <div class="form-group">
                <label for="appointment-details">Appointment Details:</label>
                <input type="text" class="form-control" id="appointment-details" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Appointment</button>
        </form>

        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script>
    $(document).ready(function() {
        $('#appointment-form').on('submit', function(e) {
            e.preventDefault();
            const details = $('#appointment-details').val();

            $.ajax({
                type: 'POST',
                url: 'schedule_appointment.php',
                data: { details: details },
                success: function(response) {
                    $('#appointment-list').append('<li>' + response + '</li>');
                    $('#appointment-details').val(''); // Clear the input
                },
                error: function() {
                    alert('Error scheduling appointment');
                }
            });
        });
    });
    </script>
</body>
</html>

