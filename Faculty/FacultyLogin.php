<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "Kiran";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Define variables to store user input for login
$logEmail = $logPassword = "";

// Define variables to store error messages for login
$logPasswordErr = "";

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    $logEmail = test_input($_POST["logEmail"]);
    $logPassword = test_input($_POST["logPassword"]);

    // Retrieve hashed password and name from the database based on the entered Email
    $stmt = $con->prepare("SELECT password, name FROM user_data WHERE email = ?");
    $stmt->bind_param("s", $logEmail);
    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashedPassword, $name);
            $stmt->fetch();
            // Password is correct, redirect to the home page or perform other actions
            if (password_verify($logPassword, $hashedPassword)) {
                session_start();
                $_SESSION["email"] = $logEmail; // Store the email in the session variable
                $_SESSION["name"] = $name; // Store the name in the session variable
                header("Location: FacultyDashboard.php");
                exit();
            } else {
                // Password is incorrect
                $logPasswordErr = "Incorrect password or blank password";
            }
        } else {
            // No user found with the provided email
            $logPasswordErr = "No user found with this email";
        }
    } else {
        // Error executing the query
        die("Error executing the query: " . $stmt->error);
    }
    $stmt->close();
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
    <style>
         body {
  font-family: 'Arial', sans-serif;
  background-image: url("../images/CollegeManagementSystemPic3.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.container {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

form {
  background-color: rgba(255, 255, 255, 0.374);
  backdrop-filter: blur(10px);
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 22vw;
}

h2 {
  text-align: center;
  color: #fff;
}

label {
  display: block;
  margin: 10px 0 5px;
  color: #555;
}

input {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.error {
  color: #ff0000;
  font-size: 14px;
}

.submit-button {
  background-color:yellow;
  color:black;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.submit-button:hover {
  background-color:darkorange;
}

.toggle-button {
  background: none;
  border: none;
  color: #0566c6;
  cursor: pointer;
  text-decoration: underline;
}

@media screen and (max-width: 600px) {
form {
  width: 70vw;
}
}
@media screen and (max-width: 900px) {
form {
  width: 60vw;
}
}
@media screen and (max-width: 1200px) {
form {
  width: 50vw;
}
}

        .backButton {
      position: absolute;
      top: 20px;
      left: 20px;
      padding: 10px 20px;
      background-color: red;
      color: black;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .backButton:hover {
      background-color: darkorange;
    }
    </style>
</head>
<body>
    <div id="login-form" class="container">
        <h2>Faculty Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
            <!-- Login form fields go here -->
            <label for="logEmail">Email:</label>
            <input type="text" name="logEmail" id="logEmail" value="<?php echo $logEmail; ?>">
            <span class="error" id="logEmailErr"></span>
            <br><br>

            <label for="logPassword">Password:</label>
            <input type="password" name="logPassword" id="logPassword" value="<?php echo $logPassword; ?>">
            <span class="error" id="logPasswordErr"><?php echo $logPasswordErr; ?></span>
            <br><br>

            <input class="submit-button" type="submit" name="login" value="Login">
            <br>

            <p>Don't have an account? <a class="toggle-button" href="FacultyRegister.php">Click here</a> to Signup.</p>
        </form>
    </div>
    <button class="backButton" onclick="goBack()">Back</button>
    <script>
    function goBack() {
            window.location.href = "../Home.php";
        }
  </script>
</body>
</html>
