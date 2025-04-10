<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("../images/CollegeManagementSystemPic8.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
        }


        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }

        a {
            display: block;
            text-align: center;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: darkblue;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>You have been logged out</h1>
        <p>Thank you for using our service. You are now logged out.</p>
        <p><a href="FacultyLogin.php">Login again</a></p>
        <p><a href="../Home.php">Return to Home Page</a></p>
    </div>
</body>

</html>
