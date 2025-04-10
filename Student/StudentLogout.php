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
                padding: 30px 40px;
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(8px);
                border-radius: 20px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
                border: 1px solid rgba(255, 255, 255, 0.4);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

        .container:hover {
              transform: translateY(-5px);
              box-shadow: 0 15px 30px rgba(0, 0, 0, 0.35);
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
        <p><a href="StudentLogin.php">Login again</a></p>
        <p><a href="../Home.php">Return to Home Page</a></p>
    </div>
</body>

</html>
