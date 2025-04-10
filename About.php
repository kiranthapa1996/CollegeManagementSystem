<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      background-image: url("images/CollegeManagementSystemPic10.jpeg");
      background-repeat: none;
      background-size: cover;
    }

    header {
      margin-top: 100px;
      background-color: yellow;
      font-size: 2rem;
    }

    section {
      background-color: skyblue;
      font-size: 2.5rem;
      margin-top: 50px;
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
  <button class="backButton" onclick="goBack()">Back</button>
  <header>
    <h1>About Us...!!!<h1>
  </header>
  <br>
  <br>
  <section>
    <p>Our College Management System is a comprehensive digital platform designed to streamline and automate every aspect of campus operations from admissions and academic records to staff management and communication ensuring efficiency, transparency, and a seamless educational experience for students, faculty, and administrators alike.</p>
  </section>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>