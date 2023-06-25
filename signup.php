<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Sign Up</title>
  <link rel="stylesheet" href="css/signup.css">
  <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>

  <style>
    body {
      background-image: url(images/b4.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      height: 100%;
    }
    .alert {
      margin-top:10px;
      color: red;
      font-size: 16px;
    }
</style>
</head>
<?php
  include 'header.php';
  include 'connection.php';

  // Get form data
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $sql_check = "SELECT * FROM patients WHERE email = '$email'";
    $result_check = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
      echo "Email already exists!";
    } else {
      // Create SQL INSERT statement
      $sql = "INSERT INTO patients (full_name, address, email, phone, dob, password, confirm_password) VALUES ('$full_name', '$address', '$email', '$phone', '$dob', '$password', '$confirm_password')";

      // Execute the SQL statement
      if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
        header('location:login.php');
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
    }
  }
  ?>
<body>

 
  <center>
    <div class="signup-box">
      <form onsubmit="return validateForm()" action="" method="post">
        <h3 class="header-text" style="text-align: center;">Let's Get Started</h3>
        <p class="header-subtext" style="text-align: center;">Add your personal details</p>
        <div id="errorContainer" class="alert alert-danger p-2 text-danger;" role="alert" style="display: none;"></div>
        <div class="label-field">
          <label for="full_name">Full Name:</label>
          <input type="text" class="input-field" placeholder="Full Name" name="full_name" id="full_name">
        </div>
        <div class="label-field">
          <label for="address">Address:</label>
          <input type="text" class="input-field" placeholder="Address" name="address" id="address">
        </div>
        <div class="label-field">
          <label for="email">Email:</label>
          <input type="email" class="input-field" placeholder="Email" name="email" id="email">
        </div>
        <div class="label-field">
          <label for="phone">Mobile Number:</label>
          <input type="text" class="input-field" placeholder="Mobile Number" name="phone" id="phone">
        </div>
        <div class="label-field">
          <label for="dob">Date of Birth:</label>
          <input type="date" class="input-field" placeholder="Date" name="dob" id="dob">
        </div>
        <div class="label-field">
          <label for="password">Create Password:</label>
          <input type="password" class="input-field" placeholder="Create Password" name="password" id="password">
        </div>
        <div class="label-field">
          <label for="confirm_password">Confirm Password:</label>
          <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" id="confirm_password">
        </div>
        <button type="submit" class="signup-btn">Sign Up</button>
        <br>
        <p class="text-2" style="text-align:center; margin-top:5px; font-size:16px;">Already have account? <a href="login.php" style="text-decoration: none; color:crimson;"><b>Login</b></a></p>

      </form>
    </div>
  </center>
 
</body>
<script>
    function validateForm() {
      var fullName = document.getElementById("full_name").value;
      var address = document.getElementById("address").value;
      var email = document.getElementById("email").value;
      var phone = document.getElementById("phone").value;
      var dob = document.getElementById("dob").value;
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirm_password").value;

      var errorContainer = document.getElementById("errorContainer");
      errorContainer.innerHTML = ""; // Clear any previous error messages

      if (fullName.trim() === "") {
        showError("Full Name must be filled out");
        return false;
      }

      if (address.trim() === "") {
        showError("Address must be filled out");
        return false;
      }

      if (email.trim() === "") {
        showError("Email must be filled out");
        return false;
      }

      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        showError("Invalid email format");
        return false;
      }

      if (phone.trim() === "") {
        showError("Mobile Number must be filled out");
        return false;
      }

      if (dob.trim() === "") {
        showError("Date of Birth must be filled out");
        return false;
      }
      var today = new Date();
      var selectedDate = new Date(dob);
      if (selectedDate >= today) {
        showError("Date of Birth must be before today");
        return false;
      }

      if (password.trim() === "") {
        showError("Create Password must be filled out");
        return false;
      }

      if (confirmPassword.trim() === "") {
        showError("Confirm Password must be filled out");
        return false;
      }

      if (password !== confirmPassword) {
        showError("Passwords do not match");
        return false;
      }

      return true; // Allow form submission if all validations pass
    }

    function showError(errorMessage) {
      var errorContainer = document.getElementById("errorContainer");
      errorContainer.innerHTML = `<div class="alert alert-danger" role="alert">${errorMessage}</div>`;
    }
    function showError(errorMessage) {
  var errorContainer = document.getElementById("errorContainer");
  errorContainer.innerHTML = errorMessage;

  if (errorMessage) {
    errorContainer.style.display = "block"; // Show the error container
  } else {
    errorContainer.style.display = "none"; // Hide the error container
  }
}

  </script>
  

</html>
<!-- php mail smptp -->

<?php

function sendEmail($recipientEmail, $subject, $message) {
    // Email configurations (SMTP server, port, etc.)
    // $smtpServer = 'your_smtp_server';
    // $smtpPort = 587;
    // $smtpUsername = 'your_smtp_username';
    // $smtpPassword = 'your_smtp_password';

    $senderEmail = 'prabhatghimire99@gmail.com';

    // Compose the email headers
    $headers = "From: $senderEmail\r\n";
    $headers .= "Reply-To: $senderEmail\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    try {
        // Send the email
        if (mail($recipientEmail, $subject, $message, $headers, "-f $senderEmail")) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send the email.";
        }
    } catch (Exception $e) {
        echo "An error occurred while sending the email: " . $e->getMessage();
    }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract the email and password from the form data
    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    

    $subject = 'Account Created Successfuly!';
    $message = "Dear $full_name,\n \nYou have created an account successfully on doctor appointment booking system, Now you can login and book your doctor from online easily!";

    sendEmail($email, $subject, $message);
}
?>
