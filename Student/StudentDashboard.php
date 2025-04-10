<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Check if user is logged in
if (!isset($_SESSION["name"])) {
    header("Location: StudentLogin.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Dashboard</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Custom styles for the dashboard */
    
    .logout-btn {
      background-color: #e74c3c;
      color: white;
      border-radius: 25px;
      padding: 10px 25px;
      font-size: 1em;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .logout-btn:hover {
      background-color: #c0392b;
      transform: scale(1.05);
    }

    .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px; /* Sidebar width */
    height: 100vh; /* Full viewport height */
    background-image: url('../images/CollegeManagementSystemPic1.jpg'); /* Your background image */
    background-position: 0 0; /* Starting position */
    background-size: cover; /* Cover the sidebar's size */
    background-repeat: no-repeat;
    animation: randomMove 20s infinite; /* Random movement animation */
  }

  /* Random Movement Animation */
  @keyframes randomMove {
    0% {
      background-position: 0 0;
    }
    20% {
      background-position: 200px 150px;
    }
    40% {
      background-position: -150px -100px;
    }
    60% {
      background-position: 100px 50px;
    }
    80% {
      background-position: -200px 0;
    }
    100% {
      background-position: 0 0;
    }
  }

  /* Sidebar Header */
  .sidebar-header {
    font-size: 24px;
    font-weight: bold;
    color: white;
    margin-bottom: 40px;
    text-align: center;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Added shadow for better readability */
  }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .sidebar-header {
      text-align: center;
      font-size: 1.5em;
      color: white;
      margin-bottom: 30px;
    }

    .content {
      margin-left: 250px;
      padding: 30px;
      background-image:url("../images/CollegeManagementSystemPic7.jpg");
    }

    .section-card {
      background-image:url("../images/CollegeManagementSystemPic9.jpeg");
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-bottom: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      color:white;
    }

    .section-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
    }

    .section-title {
      font-size: 1.5em;
      font-weight: 600;
    }

    .btn-action {
      background-color: #3498db;
      color: white;
      border-radius: 25px;
      padding: 12px 30px;
      text-align: center;
      font-size: 1.1em;
      transition: background-color 0.3s ease, transform 0.3s ease;
      display: inline-block;
    }

    .btn-action:hover {
      background-color: #2980b9;
      transform: scale(1.05);
    }

    .footer {
      margin-top: 40px;
      text-align: center;
      color: #7f8c8d;
    }

  </style>
</head>
<body class="bg-gray-100">

  <!-- Sidebar -->
  <div class="sidebar">
  <div class="flex flex-col items-center justify-center w-full h-full bg-black bg-opacity-50">
    <div class="sidebar-header">
      Student Dashboard
    </div>
</div>
</div>
  <!-- Main Content Area -->
  <div class="content">
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md mb-8">
      <div class="container-fluid">
      <h2>Welcome, <?php echo $_SESSION["name"]; ?>!</h2>
        <button class="logout-btn" onclick="window.location.href='StudentLogout.php'">Logout</button>
      </div>
    </nav>

    <!-- Content Sections -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- Fee Payment Section -->
      <div class="section-card">
        <h3 class="section-title">Fee Payment</h3>
        <p>Your current fee balance: <strong>$500</strong></p>
        <p>Click below to make an online payment for your fees:</p>
        <a href="#" class="btn-action">Pay Fees Now</a>
      </div>

      <!-- ID Card Application Section -->
      <div class="section-card">
        <h3 class="section-title">Apply for ID Card</h3>
        <p>Need a new ID card? Apply for it below:</p>
        <a href="#" class="btn-action">Apply for ID Card</a>
      </div>

      <!-- Courses Section -->
      <div class="section-card">
        <h3 class="section-title">My Courses</h3>
        <p>Manage and view your enrolled courses here.</p>
        <a href="#" class="btn-action">View Courses</a>
      </div>

      <!-- Timetable Section -->
      <div class="section-card">
        <h3 class="section-title">Timetable</h3>
        <p>Check your class schedule and plan your day accordingly.</p>
        <a href="#" class="btn-action">View Timetable</a>
      </div>

      <!-- Grades Section -->
      <div class="section-card">
        <h3 class="section-title">Grades</h3>
        <p>Review your grades and academic performance.</p>
        <a href="#" class="btn-action">View Grades</a>
      </div>

    </div>

    <!-- Footer -->
    <div class="footer">
      <p>&copy; 2025 College Management System. All rights reserved.</p>
    </div>
  </div>

  <!-- Bootstrap and Tailwind JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">

function updateWelcomeMessage() {
            var username = '<?php echo $_SESSION["name"]; ?>';
            var welcomeMessage = document.querySelector('#home h2');
            welcomeMessage.textContent = 'Welcome, ' + username + '!';
        }
 
  </script>
   <?php
    // Check if the profile has been updated successfully and trigger the JavaScript function to update the welcome message
    if (isset($_SESSION["profile_updated"]) && $_SESSION["profile_updated"]) {
        echo '<script>updateWelcomeMessage();</script>';
        // Unset the session variable to prevent the message from appearing on subsequent page loads
        unset($_SESSION["profile_updated"]);
    }
    ?>
</body>
</html>
