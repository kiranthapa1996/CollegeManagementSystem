<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="form.css">
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Fetch form data
        var formData = new FormData(this);

        // Send form data to PHP script using AJAX
        fetch('submit_form.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.text())
          .then(data => {
            alert(data); // Display the response message
            this.reset(); // Reset the form after successful submission
          })
          .catch(error => console.error('Error:', error));
      });
    });

    function goBack() {
      window.history.back();
    }
  </script>
  <style>
    #message {
      height: 150px;
      width: 275px;
    }

    .Or {
      text-align: center;
    }

    .button {
      background-color: yellow;
      cursor: pointer;
      width: 100px;
      height: 40px;
    }

    .button:hover {
      background-color: darkorange;
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

    h2{
      color:black;
    }
  </style>
</head>

<body>
  <button class="backButton" onclick="goBack()">Back</button>
  <div class="form-container">
    <h2>Contact Us</h2>
    <form id="contactForm" action="submit_form.php" method="post">
      <p><u>Send Message</u></p>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" placeholder="Your Name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Your Email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" placeholder="Your Message" required></textarea>
      <br>
      <br>
      <button class="button" type="submit">Send</button>
      <p class="Or">OR</p>
      <p class="Or"><u>Contact us at</u>: <strong>9824212980</strong></p>

    </form>
  </div>

</body>

</html>