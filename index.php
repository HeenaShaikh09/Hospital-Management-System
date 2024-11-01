<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hospital Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css/stl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .container-fluid {
            background-color: #56b9a2;
        }


        .navbar-expand-lg .navbar-collapse {
            display: flex !important;
            flex-basis: auto;
            background-color: #56b9a2;
        }


        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        .card {
            height: 100%;
            /* Ensures all cards are the same height */
        }

        footer {
            background-color: lightgrey;
            padding: 20px;
            text-align: center;
            width: 100%;
        }

        footer h3 {
            margin: 0;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">About Us</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="appointment.php">Appointments</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown link</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                            <li><a class="dropdown-item" href="depart.php">Departments</a></li>
                            <li><a class="dropdown-item" href="user.php">User</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="button-container">
                <button class="btn login-btn" style="background-color: red; color: white;" onclick="window.location.href='user.php';">Login</button>
                <button class="btn register-btn" style="background-color: green; color: white;" onclick="window.location.href='signup.php';">Register</button>
            </div>
        </div>
    </nav>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active"><img src="images/doc2.jpg" class="d-block w-100" alt="..."></div>
            <div class="carousel-item"><img src="images/doc3.jpg" class="d-block w-100" alt="..."></div>
            <div class="carousel-item"><img src="images/doc4.jpg" class="d-block w-100" alt="..."></div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .content {
            margin: 20px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            box-align: center;

        }
    </style>
    </head>

    <body>


        <div class="container content">
            <h2>Our Mission</h2>
            <p>
                We are dedicated to providing exceptional healthcare services while ensuring efficient management of hospital operations.
                Our comprehensive platform streamlines administrative tasks, enhances communication, and supports medical staff in delivering the highest quality of patient care.
                With a focus on compassion and innovation, we aim to create a seamless experience for patients and providers alike.
                Explore our services and join us in our mission to transform healthcare for the better!
            </p>
        </div>

        <br><br>

        <p style="text-align:center" ;><b>"Your Health, Our Priority Managed with Excellence."</b></p>

        <div class="container mt-5">
            <h1 class="text-center mb-4">Health Articles</h1>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/diabaties.jpg" class="card-img-top" alt="Disease Image">
                        <div class="card-body">
                            <h5 class="card-title">Understanding Diabetes</h5>
                            <p class="card-text">Learn about diabetes, its symptoms, and management strategies.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/disease_pre.jpg" class="card-img-top" alt="Treatment Image">
                        <div class="card-body">
                            <h5 class="card-title">Heart Disease Prevention</h5>
                            <p class="card-text">Discover ways to prevent heart disease and maintain heart health.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/Hypertension.jpg" class="card-img-top" alt="Disease Image">
                        <div class="card-body">
                            <h5 class="card-title">Managing Hypertension</h5>
                            <p class="card-text">Explore effective strategies to manage high blood pressure.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <br></br>

                <!-- Card 4 -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/Asthma1.jpg" class="card-img-top" alt="Treatment Image">
                        <div class="card-body">
                            <h5 class="card-title">Asthma Treatment Options</h5>
                            <p class="card-text">Learn about the various treatment options for asthma.
                                Asthma is a chronic lung disease that causes inflammation and tightening of the muscles around the airways,
                                making breathing difficult. Symptoms include: coughing, wheezing, shortness of breath, and chest tightness. </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/cancer_awr.jpg" class="card-img-top" alt="Disease Image">
                        <div class="card-body">
                            <h5 class="card-title">Cancer Awareness</h5>
                            <p class="card-text">Understand the types of cancer and the importance of early detection.
                                Cancer is a large group of diseases that can start in almost any organ or tissue of the body when abnormal cells grow uncontrollably,
                                go beyond their usual boundaries to invade adjoining parts of the body and/or spread to other organs.
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/mental_health.jpg" class="card-img-top" alt="Treatment Image">
                        <div class="card-body">
                            <h5 class="card-title">Mental Health Matters</h5>
                            <p class="card-text">Explore the importance of mental health and available treatments.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .container {
                margin-top: 50px;
            }

            .time-slot {
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .time-slot:hover {
                background-color: #f0f0f0;
            }

            .selected {
                background-color: #007bff;
                color: white;
            }
        </style>


        <div class="container">
            <h1 class="text-center mb-4">Available Appointment Times</h1>
            <div class="row" id="timeSlots">
                <!-- Time slots will be generated here -->
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-primary" id="confirmBtn" disabled>Confirm Appointment</button>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const timeSlots = document.getElementById('timeSlots');
                const confirmBtn = document.getElementById('confirmBtn');

                const availableTimes = [
                    '9:00 AM',
                    '9:30 AM',
                    '10:00 AM',
                    '10:30 AM',
                    '11:00 AM',
                    '11:30 AM',
                    '1:00 PM',
                    '1:30 PM',
                    '2:00 PM',
                    '2:30 PM',
                    '3:00 PM',
                    '3:30 PM',
                ];

                availableTimes.forEach(time => {
                    const col = document.createElement('div');
                    col.classList.add('col-md-4', 'mb-3');

                    const slot = document.createElement('div');
                    slot.classList.add('time-slot', 'p-3', 'border', 'text-center');
                    slot.textContent = time;

                    slot.addEventListener('click', () => {
                        document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                        slot.classList.add('selected');
                        confirmBtn.disabled = false;
                    });

                    col.appendChild(slot);
                    timeSlots.appendChild(col);
                });

                confirmBtn.addEventListener('click', () => {
                    const selectedSlot = document.querySelector('.time-slot.selected');
                    if (selectedSlot) {
                        alert(`Appointment confirmed for ${selectedSlot.textContent}`);
                    }
                });
            });
        </script>


        <footer>
            <section id="services">
                <h3>Contact Us</h3>
                <p>Address: 123 Hospital Lane, City, Country</p>
                <p>Phone: <a href="tel:+1234567890">+1 234 567 890</a></p>
                <p>Email: <a href="mailto:info@hospital.com">info@hospital.com</a></p>
            </section>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>