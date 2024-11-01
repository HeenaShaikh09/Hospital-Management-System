<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Departments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 900px;
    margin: auto;
    text-align: center;
}

h1 {
    color: #2c3e50;
}

.departments {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.department {
    background: white;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    width: 180px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.department img {
    max-width: 100%;
    height: auto;
}

.department:hover {
    transform: scale(1.05);
}

.department h3 {
    margin: 10px 0 0;
    font-size: 1.2em;
    color: #2980b9;
}

    </style>
    <div class="container">
        <h1>Our Hospital Departments</h1>
        <div class="departments" id="departments">
            <!-- Departments will be injected here by JavaScript -->
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
