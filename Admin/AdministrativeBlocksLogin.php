<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "Kiran");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define variables to store user input for login
$logUsername = $logPassword = "";

// Define variables to store error messages for login
$logPasswordErr = "";

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    $logUsername = test_input($_POST["logUsername"]);

    $logPassword = test_input($_POST["logPassword"]);

    // Retrieve password from the database based on the entered Username
    $stmt = $conn->prepare("SELECT password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $logUsername);
    $stmt->execute();
    $stmt->bind_result($Password);
    $stmt->fetch();
    if ($stmt->num_rows > 0) {
        $logPasswordErr = "Wrong Username or password";
    }
    $stmt->close();

    // Retrieve name from the database based on the entered username
    $stmt = $conn->prepare("SELECT name FROM admins WHERE username = ?");
    $stmt->bind_param("s", $logUsername);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();
    $stmt->close();
    // Verify the entered password against the  password
    if ($logPassword===$Password) {
        // Password is correct, redirect to the home page or perform other actions
        session_start();
        $_SESSION["username"] = $name;
        $_SESSION["role"] = 0;
        header("Location: AdministrativeBlocksDashboard.php");
        exit();
    } else {
        // Password is incorrect
        $logPasswordErr = "Incorrect password";
    }
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrative Login</title>
    <link rel="stylesheet" href="form.css"> 
</head>
<body>
    <div id="login-form" class="container">
        <h2>Administrative Login</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
                <!-- Login form fields go here -->
                <label for="logUsername">Username:</label>
                <input type="text" name="logUsername" id="logUsername" value="<?php echo $logUsername; ?>">
                <span class="error" id="logUsernameErr"></span>
                <br><br>

                <label for="logPassword">Password:</label>
                <input type="password" name="logPassword" id="logPassword" value="<?php echo $logPassword; ?>">
                <span class="error" id="logPasswordErr"><?php echo $logPasswordErr; ?></span>
                <br><br>

                <input class="submit-button" type="submit" name="login" value="Login">
                <br>

                <p>Not an admin? <a class="toggle-button" href="../Home.php">Click here</a> for user login.</p>
            </form>
    </div>
    <script>
        function validateForm() {
            var logUsername = document.getElementById("logUsername").value;
            var logPassword = document.getElementById("logPassword").value;

            // Reset previous error messages
            document.getElementById("logUsernameErr").innerText = "";
            document.getElementById("logUsernameErr").innerText = "";

            // Validate Username
            if (logUsername === "") {
                document.getElementById("logUsernameErr").innerText = "Username is required";
                return false;
            }

            // Validate Password
            if (logPassword === "") {
                document.getElementById("logPasswordErr").innerText = "Password is required";
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>