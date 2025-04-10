<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Check if user is logged in
if (!isset($_SESSION["name"])) {
    header("Location: FacultyLogin.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Faculty Dashboard</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .content{
      background-image: url("../images/CollegeManagementSystemPic7.jpg");

    }

    .sidebar-animated {
      background-image: url("../images/CollegeManagementSystemPic7.jpg");
      background-size: cover;
      background-position: center;
      animation: moveBackground 20s infinite linear;
    }

    @keyframes moveBackground {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- Sidebar -->
  <div class="fixed top-0 left-0 w-64 h-screen shadow-md sidebar-animated text-white z-20">
    <div class="text-center text-l font-bold bg-black/70 py-5">
      <u>Materials</u>
    </div>
    <nav class="flex flex-col mt-4 text-sm">
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-person-fill"></i> My Profile
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-book-half"></i> Manage Courses
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-calendar-check"></i> Attendance
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-upload"></i> Upload Marks
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-chat-left-text"></i> Feedback
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-clock-history"></i> Timetable
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-folder"></i> Study Materials
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-layout-text-window"></i> Class Schedule
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-megaphone"></i> Notices
      </a>
      <a href="#" class="px-6 py-3 hover:bg-black/60 transition-all flex items-center gap-3">
        <i class="bi bi-gear"></i> Settings
      </a>
    </nav>
  </div>

  <!-- Header -->
  <header class="fixed top-0 left-64 right-0 h-16 bg-gray-800 text-white flex items-center justify-between px-8 shadow z-10">
    <h1 class="text-xl font-semibold">Faculty Dashboard</h1>
    <button onclick="logout()" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600 transition">Logout</button>
  </header>

  <!-- Main Content -->
  <main class="ml-64 mt-20 px-8 pb-8">
    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow hover:shadow-md p-6 text-center">
        <h3 class="text-lg font-semibold">Courses</h3>
        <p class="text-gray-600">5 Assigned</p>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-md p-6 text-center">
        <h3 class="text-lg font-semibold">Students</h3>
        <p class="text-gray-600">120 Enrolled</p>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-md p-6 text-center">
        <h3 class="text-lg font-semibold">Attendance</h3>
        <p class="text-gray-600">87% Avg</p>
      </div>
      <div class="bg-white rounded-xl shadow hover:shadow-md p-6 text-center">
        <h3 class="text-lg font-semibold">Tasks</h3>
        <p class="text-gray-600">3 Pending Reviews</p>
      </div>
    </div>

    <!-- Quick Tools -->
    <h2 class="text-2xl font-semibold mb-4">Quick Tools</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="bg-white p-5 rounded-xl border-l-4 border-blue-500 shadow">
        <h4 class="text-xl font-medium mb-1">Upload Materials</h4>
        <p class="text-sm text-gray-600">Share PDFs, PPTs, and documents easily.</p>
      </div>
      <div class="bg-white p-5 rounded-xl border-l-4 border-green-500 shadow">
        <h4 class="text-xl font-medium mb-1">Manage Timetable</h4>
        <p class="text-sm text-gray-600">Edit your weekly schedule here.</p>
      </div>
      <div class="bg-white p-5 rounded-xl border-l-4 border-yellow-500 shadow">
        <h4 class="text-xl font-medium mb-1">Student Feedback</h4>
        <p class="text-sm text-gray-600">See what students are saying.</p>
      </div>
      <div class="bg-white p-5 rounded-xl border-l-4 border-purple-500 shadow">
        <h4 class="text-xl font-medium mb-1">Performance Analytics</h4>
        <p class="text-sm text-gray-600">Track grades and trends.</p>
      </div>
      <div class="bg-white p-5 rounded-xl border-l-4 border-red-500 shadow">
        <h4 class="text-xl font-medium mb-1">Post Announcements</h4>
        <p class="text-sm text-gray-600">Notify students about updates.</p>
      </div>
      <div class="bg-white p-5 rounded-xl border-l-4 border-indigo-500 shadow">
        <h4 class="text-xl font-medium mb-1">Internal Chat</h4>
        <p class="text-sm text-gray-600">Message with students securely.</p>
      </div>
    </div>
  </main>
  <!-- Script -->
  <script>
    function logout() {
      window.location.href = "FacultyLogout.php";
    }
  </script>

</body>
</html>
