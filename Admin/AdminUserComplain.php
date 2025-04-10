<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Complain Message</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    #reviews-container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
    }

    #reviews-table {
      width: 100%;
      border-collapse: collapse;
    }

    #reviews-table th,
    #reviews-table td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }

    #reviews-table th {
      background-color: #f2f2f2;
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

    h1{
      text-align: center;
    }
  </style>
</head>

<body>
  <button class="backButton" onclick="goBack()">Back</button>
  <div id="reviews-container">
    <h1>Customer Complain Message</h1>
    <table id="reviews-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Submission Date/Time</th>
        </tr>
      </thead>
      <tbody id="reviews-body">
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Kiran";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to select data from reviews table
        $sql = "SELECT id, name, email, message, Date_Time FROM contact_form";
        $result = $conn->query($sql);

        // Check if there are rows returned
        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "<td>" . $row["Date_Time"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No reviews found</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
  <script>
    function goBack() {
      window.location.href = "AdminDashboard.php";
    }
  </script>
</body>

</html>