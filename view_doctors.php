<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Doctors</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    
</head>
<body>
<style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff; /* White background for the container */
            padding: 20px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        h2 {
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle; /* Center align content */
        }
        .btn-warning {
            background-color: #ffc107; /* Custom button color */
            border-color: #ffc107; /* Custom border color */
        }
        .btn-warning:hover {
            background-color: #e0a800; /* Darker shade on hover */
        }
        .no-results {
            text-align: center; /* Center align no results message */
            font-weight: bold; /* Bold text */
        }
    </style>


<div class="container mt-4">
    <h2>Doctor List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'doctors');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM doctor";
            $result = $conn->query($sql);

            // Check for query error
            if (!$result) {
                die("Query failed: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['specialty']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='update_doctor.php?id={$row['id']}' class='btn btn-warning'>Update</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No results found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <a href="doctor.php" class="btn btn-secondary">Back to Admin</a>
</div>

        </body>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
