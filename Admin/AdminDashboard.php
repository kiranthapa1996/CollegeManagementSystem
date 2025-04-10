<?php
// Start session
session_start();

// Check if the admin username is set in the session
if (!isset($_SESSION["username"])) {
    // Redirect to login page or handle unauthorized access
    header("Location: AdminLogin.php");
    exit; // Stop further execution
}

$con = mysqli_connect("localhost", "root", "", "Kiran");
if (!$con)
    die("Connection Failed" . mysqli_connect_error());

// Include the navigation bar
include '../components/adminnavfixed.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - College Management</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Custom Style */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        .card {
            border-radius: 10px;
        }
        .dashboard-card {
            background-color: #1a202c;
            color: white;
        }
        .sidebar {
            background-color: #2d3748;
            color: white;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #cbd5e0;
        }
        .sidebar .nav-link:hover {
            background-color: #4a5568;
        }
        .navbar {
            background-color: #2b6cb0;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users"></i> Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chalkboard-teacher"></i> Faculty
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-book"></i> Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-calendar-check"></i> Attendance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cogs"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AdminLogout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-4">
                <div class="row">
                    <!-- Dashboard Cards -->
                    <div class="col-md-3 mb-4">
                        <div class="card dashboard-card p-3">
                            <h5>Total Students</h5>
                            <h2>1,256</h2>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card dashboard-card p-3">
                            <h5>Total Faculty</h5>
                            <h2>215</h2>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card dashboard-card p-3">
                            <h5>Total Courses</h5>
                            <h2>58</h2>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card dashboard-card p-3">
                            <h5>Total Attendance</h5>
                            <h2>98%</h2>
                        </div>
                    </div>
                </div>

                <!-- Data Visualization -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card p-4">
                            <h5>Enrollment Over Time</h5>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card p-4">
                            <h5>Recent Activity</h5>
                            <ul class="list-group">
                                <li class="list-group-item">Student John Doe logged in</li>
                                <li class="list-group-item">Faculty Dr. Smith added new course</li>
                                <li class="list-group-item">Attendance for Class 101 completed</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js (for Data Visualization) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Student Enrollments',
                    data: [300, 400, 500, 600, 700, 800],
                    borderColor: '#4CAF50',
                    borderWidth: 2,
                    fill: false
                }]
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
