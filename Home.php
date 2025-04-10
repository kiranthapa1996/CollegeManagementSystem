<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 0;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }


        header {
            background-color: White;
            color: Black;
            padding: 0.2rem;
            text-align: center;
        }

        header img.leftimage {
            max-width: 50%;
            height: 70px;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            margin: 0.5rem;
        }

        header img.rightimage {
            max-width: 50%;
            height: 70px;
            border-radius: 50%;
            position: absolute;
            top: 0;
            right: 0;
            margin: 0.5rem;
        }


        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            margin: 0 1rem;
            font-weight: bold;

        }

        .navbar {
            background-color: #555;
            padding: 0.5rem;
            text-align: right;
        }

        ul {
            list-style-type: none;
            display: flex;
        }

        li {
            margin-right: 2px;
        }

        li.left {
            margin-right: auto;

        }

        a:hover {
            color: #ffc107;
        }

        section {
            background-image: url("images/CollegeManagementSystemPic1.jpg");
            height: 150px;
            padding: 250px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: relative;

        }
        .floating-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        font-size: 2rem; /* Adjust font size for better fit */
        line-height: 1.4; /* Adjust line height */
        max-width: 80%; /* Prevent text from stretching too much */
        padding: 10px;
        animation: blink 1s infinite; /* Make the text blink */
    }

    /* Dropdown menu styles */
.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    min-width: 200px;
    top: 100%;
    left: 0;
    z-index: 1;
    flex-direction: column;
    padding: 0;
}

.dropdown-content li {
    margin: 0;
}

.dropdown-content a {
    padding: 10px 15px;
    display: block;
    color: white;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #444;
    color: #ffc107;
}

.dropdown:hover .dropdown-content {
    display: flex;
}


    h2 {
        margin: 0; /* Remove margin */
        font-weight: bold; /* Make text bold */
    }

    /* Keyframes to create blinking effect */
    @keyframes blink {
        0% {
            opacity: 1;
            color: red;
        }
        25% {
            opacity: 1;
            color: yellow;
        }
        50% {
            opacity: 1;
            color: green;
        }
        75% {
            opacity: 1;
            color: blue;
        }
        100% {
            opacity: 1;
            color: purple;
        }
    }
        footer {
            background-color: rgb(22, 23, 24);
            color: white;
            padding: 1rem;
            position: fixed;
            text-align: center;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <header>
        <h1>College Management System</h1>
        <img class="leftimage" src="images/CollegeManagementSystemPic2.jpg" alt="Left image">
        <img class="rightimage" src="images/CollegeManagementSystemPic2.jpg" alt="Right Image">
    </header>

    <nav class="navbar">
        <ul>
            <li class="left dropdown"><a href="#">Admin Login</a>
            <ul class="dropdown-content">
                <li><a href="Admin/AdminLogin.php">Main Admin</a></li>
                <li><a href="Admin/AdministrativeBlocksLogin.php">Administrative Blocks</a></li>
            </ul>
            </li>
            <li><a href="About.php">About Us</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
            <li><a href="Faculty/FacultyLogin.php">Faculty Login</a></li>
            <li><a href="Student/StudentLogin.php">Student Login</a></li>

        </ul>
    </nav>
    <section>
    <div class="floating-text">
        <h2>Transform your campus experience with our seamless and efficient College Management System – all your tasks in one place!</h2>
    </div>
    </section>
    <footer>
        &copy; 2025 College Management System
    </footer>

</body>

</html>