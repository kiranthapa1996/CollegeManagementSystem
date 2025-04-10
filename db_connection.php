<?php
// Database configuration
$host = "localhost"; // Your database host (e.g., localhost)
$dbname = "Kiran"; // Your database name
$username = "root"; // Your database username
$password = ""; // Your database password

// Attempt to establish a connection to the database using PDO
try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optionally, set character encoding to UTF-8
    $conn->exec("SET NAMES 'utf8'");
} catch(PDOException $e) {
    // If an error occurs during database connection, output the error message
    die("Database connection failed: " . $e->getMessage());
}
?>
