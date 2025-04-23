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

$regName = $regEmail = $regPassword = $confirmPassword = $regPhoneNumber = "";
$regEmailErr = "";
$regPhoneNumberErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Validate and sanitize form inputs
    $regName = test_input($_POST["regName"]);
    $regEmail = test_input($_POST["regEmail"]);
    $regPassword = test_input($_POST["regPassword"]);
    $confirmPassword = test_input($_POST["confirmPassword"]);
    $regPhoneNumber = test_input($_POST["regPhoneNumber"]);

    // Check if email is already taken
    $checkEmailQuery = "SELECT * FROM user_data WHERE email = ?";
    $checkEmailStmt = $con->prepare($checkEmailQuery);
    $checkEmailStmt->bind_param("s", $regEmail);
    $checkEmailStmt->execute();
    $checkEmailResult = $checkEmailStmt->get_result();
    if ($checkEmailResult->num_rows > 0) {
        $regEmailErr = "Email is already taken";
    }
    $checkEmailStmt->close();

    $checkPhoneQuery = "SELECT * FROM user_data WHERE phone_number = ?";
    $checkPhoneStmt = $con->prepare($checkPhoneQuery);
    $checkPhoneStmt->bind_param("s", $regPhoneNumber);
    $checkPhoneStmt->execute();
    $checkPhoneResult = $checkPhoneStmt->get_result();
    if ($checkPhoneResult->num_rows > 0) {
    $regPhoneNumberErr = "Phone number already exists for another account";
    }
    $checkPhoneStmt->close();


    // If no email error, insert data into database
    if (empty($regEmailErr) && empty($regPhoneNumberErr)) {
      $hashedPassword = password_hash($regPassword, PASSWORD_DEFAULT);
      $insertQuery = "INSERT INTO user_data (name, email, password, phone_number) VALUES (?, ?, ?, ?)";
      $insertStmt = $con->prepare($insertQuery);
      $insertStmt->bind_param("ssss", $regName, $regEmail, $hashedPassword, $regPhoneNumber);
      if ($insertStmt->execute()) {
          // Registration successful
          // Set session variables
          $_SESSION['name'] = $regName;
          $_SESSION['email'] = $regEmail;
          $_SESSION['phone_number'] = $regPhoneNumber;
            // Redirect to login page
            echo "<script>
        alert('Your account has been registered');
        window.location.href = 'FacultyLogin.php';
        </script>";
        exit();
        } else {
            // Handle database insertion error
            echo "Error: " . $insertStmt->error;
        }
        $insertStmt->close();
    }
}

// Function to sanitize user input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     <style>
         body {
  font-family: 'Arial', sans-serif;
  background-image: url("../images/CollegeManagementSystemPic7.jpg");
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
  margin-bottom: 30px;
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
    </style>
 
    <script>
        function validateForm() {
            var regName = document.getElementById("regName").value;
            var regEmail = document.getElementById("regEmail").value;
            var regPassword = document.getElementById("regPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var regPhoneNumber = document.getElementById("regPhoneNumber").value;

            // Reset previous error messages
            document.getElementById("regNameErr").innerText = "";
            document.getElementById("regEmailErr").innerText = "";
            document.getElementById("regPasswordErr").innerText = "";
            document.getElementById("confirmPasswordErr").innerText = "";
            document.getElementById("regPhoneNumberErr").innerText = "";

            // Validate Name
            if (regName === "") {
                document.getElementById("regNameErr").innerText = "Name is required";
                return false;
            }

            var nameFormat = /^(?!.*\d)[A-Z][a-zA-Z\s]{5,}$/;
            if (!nameFormat.test(regName.trim()) || regName.trim().length < 6) {
                document.getElementById("regNameErr").innerText = "Enter a valid Full  name starting with a capital letter";
                return false;
            }


            // Validate Email
            if (regEmail === "") {
                document.getElementById("regEmailErr").innerText = "Email is required";
                return false;
            }

            var mailFormat = /^[a-zA-Z]+[a-zA-Z0-9._%+-]*[0-9]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;
            if (!mailFormat.test(regEmail)) {
                document.getElementById("regEmailErr").innerText = "Please enter a valid email";
                return false;
            }


            // Validate Password
            if (regPassword === "") {
                document.getElementById("regPasswordErr").innerText = "Password is required";
                return false;
            }
            var passStrength = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
            if (!(regPassword.match(passStrength))) {
                document.getElementById("regPasswordErr").innerText = "Password must contain atleast 8 characters with atleast one uppercase, one lowercase, one digit and one special character.";
                return false;
            }

            if (regPassword.length < 8) {
                document.getElementById("regPasswordErr").innerText = "Password must be at least 8 characters long";
                return false;
            }

            // Validate Confirm Password
            if (confirmPassword === "") {
                document.getElementById("confirmPasswordErr").innerText = "Please confirm the password";
                return false;
            }

            // Check if Passwords match
            if (regPassword !== confirmPassword) {
                document.getElementById("confirmPasswordErr").innerText = "Passwords do not match";
                return false;
            }

            // Validate Phone Number
            var phoneFormat = /^(97|98)\d{8}$/;
            if (!regPhoneNumber.match(phoneFormat)) {
            document.getElementById("regPhoneNumberErr").innerText = "Invalid phone number";
            return false;
            }


            return true;
        }
    </script>
</head>

<body>
    <div id="registration-form" class="container">
        <h2>Faculty Registration</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
            <!-- Registration form fields go here -->
            <label for="regName">Name:</label>
            <input type="text" name="regName" id="regName" value="<?php echo $regName; ?>">
            <span class="error" id="regNameErr"></span>
            <br>

            <label for="regEmail">Email:</label>
            <input type="text" name="regEmail" id="regEmail" value="<?php echo $regEmail; ?>">
            <span class="error" id="regEmailErr"><?php echo $regEmailErr; ?></span>
            <br>

            <label for="regPassword">Password:</label>
            <input type="password" name="regPassword" id="regPassword" value="<?php echo $regPassword; ?>">
            <span class="error" id="regPasswordErr"></span>
            <br>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword" id="confirmPassword" value="<?php echo $regPassword; ?>">
            <span class="error" id="confirmPasswordErr"></span>
            <br>

            <label for="regPhoneNumber">Phone Number:</label>
            <input type="text" name="regPhoneNumber" id="regPhoneNumber" value="<?php echo $regPhoneNumber; ?>">
            <span class="error" id="regPhoneNumberErr"><?php echo $regPhoneNumberErr; ?></span>
            <br>

            <input class="submit-button" type="submit" name="register" value="Register">
            <br>

            <p>Already have an account? <a class="toggle-button" href="FacultyLogin.php">Click here</a> to log in.</p>

        </form>
    </div>
</body>

</html>