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
    <title>Administrative Blocks Dashboard</title>
    <!-- Link to Tailwind CSS (you can add it locally or through CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image:url("../images/CollegeManagementSystemPic9.jpeg");
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1a202c;
            color: white;
            padding-top: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 16px;
            margin-bottom: 10px;
            transition: background-color 0.3s;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #2b3340;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            color: white;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .card-body {
            font-size: 1rem;
            color: #666;
        }

        .footer {
            background-color: #1a202c;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Optional: Add a responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                width: 100%;
                position: static;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center text-2xl text-white">Admin Panel</h2>
        <a href="#">Dashboard</a>
        <a href="#">Manage Students</a>
        <a href="#">Manage Faculty</a>
        <a href="#">Manage Courses</a>
        <a href="#">Manage Timetables</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <a href="AdministrativeBlocksLogout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="text-3xl font-bold mb-6">Administrative Blocks Dashboard</h1>

        <div class="grid grid-cols-3 gap-6">
            <!-- Card 1: Overview of Students -->
            <div class="card col-span-1">
                <div class="card-header">Total Students</div>
                <div class="card-body">
                    <p>There are 500 students enrolled in the system.</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4">View Details</button>
                </div>
            </div>

            <!-- Card 2: Faculty Overview -->
            <div class="card col-span-1">
                <div class="card-header">Total Faculty</div>
                <div class="card-body">
                    <p>We have 30 faculty members in various departments.</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4">View Details</button>
                </div>
            </div>

            <!-- Card 3: Active Courses -->
            <div class="card col-span-1">
                <div class="card-header">Active Courses</div>
                <div class="card-body">
                    <p>Currently, there are 40 active courses offered.</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4">View Details</button>
                </div>
            </div>
        </div>

        <!-- Card 4: Timetable Overview -->
        <div class="card">
            <div class="card-header">Timetable Overview</div>
            <div class="card-body">
                <p>Check and manage the current academic semester's timetable.</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4">View Timetable</button>
            </div>
        </div>

        <!-- Card 5: Report Generation -->
        <div class="card">
            <div class="card-header">Generate Reports</div>
            <div class="card-body">
                <p>Create and download reports for student performance, attendance, and more.</p>
                <button class="bg-green-500 text-white px-4 py-2 rounded mt-4">Generate Report</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 College Management System. All rights reserved.</p>
    </div>

</body>

</html>

