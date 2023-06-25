<?php
include('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Doctor</title>
  <style>
    
    body {

      background-image: url(../images/b4.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      height: 100%;

    }

    * {
      font-family: poppins;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .signup-box {
      margin-top: 30px;
      width: 30%;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      justify-content: center;
      align-items: center;
      padding-bottom: 10px;
      
   
    }

    .label-field {
      margin-top: 5px;
      width: 80%;
      margin-bottom: 5px;
      text-align: left;
    }

    .input-field {
      border-radius: 8px;
      position: relative;
      width: 100%;
      padding: 8px;
      outline: none;
      border: 1px solid crimson;
    }

    .signup-btn {
      margin-top: 8px;
      width: 80%;
      background-color: rgb(226, 52, 87);
      cursor: pointer;
      color: #fff;
      transition: all ease 0.5s;
      border: 1px solid crimson;
      outline: none;
      border-radius: 6px;
      padding: 8px;
    }
    span{
      color: crimson;
      font-size: 14px;
    }

    .signup-btn:hover {
      background-color: crimson;
    }
    .close-btn {
  top: 10px;
  right: 10px;
  cursor: pointer;
  font-size: 20px;
}

.close-btn:hover {
  color: red;
}

  </style>
</head>
<body>
  
<?php
  include '../connection.php';

  //get form data:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $full_name = $_POST['full_name'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $specialist = $_POST['specialist'];
      $doctor_password = $_POST['doctor_password'];
      $confirm_password = $_POST['confirm_password'];
      $imagePath = "../doctor-images/" . $_FILES["image"]["name"];

      //move uploaded image file into folder
      move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

  
      $sql_check = "SELECT * FROM doctors WHERE email = '$email'";
      $result_check = mysqli_query($con, $sql_check);
  
      if (mysqli_num_rows($result_check) > 0) {
        echo "Email already exists!";
      } else {
        // Create SQL INSERT statement
        $sql = "INSERT INTO doctors (full_name, address, email, phone, specialist, doctor_password, confirm_password,image_path) VALUES ('$full_name', '$address', '$email', '$phone', '$specialist', '$doctor_password', '$confirm_password', '$imagePath')";
  
        // Execute the SQL statement
        if (mysqli_query($con, $sql)) {
          echo  "<script>alert'New record created successfully'</script>";
          header('location: doctor-details.php');
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
      }
    }
    ?>

<center>


<div class="signup-box">
  <form onsubmit="return validateForm()" action="add-doctor.php" method="post" enctype="multipart/form-data">
      <h2 class="header-text" style="text-align: center;">Let's Get Started</h2>
      <p class="header-subtext" style="text-align: center;">Add doctor details</p>
      <div class="label-field">
        <label for="full_name">Full Name:</label>
        <input type="text" class="input-field" placeholder="Full Name" name="full_name" id="full_name" required autocomplete="off">
        <div id="error-message"></div>
      </div>
      <div class="label-field">
        <label for="address">Address:</label>
        <input type="text" class="input-field" placeholder="Address" name="address" id="address" required autocomplete="off">
        <span id="address-error"></span>
      </div>
      <div class="label-field">
        <label for="email">Email:</label>
        <input type="email" class="input-field" placeholder="Email" name="email" id="email" required autocomplete="off">
        <span id="email-error" style="color:crimson;"></span>
      </div>
      <div class="label-field">
        <label for="phone">Mobile Number:</label>
        <input type="text" class="input-field" placeholder="Mobile Number" name="phone" id="phone" required autocomplete="off">
        <span id="phone-error"></span>
      </div>
      <div class="label-field">
        <label for="option">Speciality: </label>
          <select class="custom-select" name="specialist" style="width: 100%; padding:8px; border-radius:6px; outline:none;border:1px solid crimson;margin-top:3px;" required>
                   <option selected disabled>Speciality</option>
                   <option value="Dermatologist">Dermatologist</option>
                  <option value="Cardiologist">Cardiologist</option>
                  <option value="Infectious Disease">Infectious disease</option>
                  <option value="Psychiatrist">Psychiatrist</option>
                  <option value="Family Medicine">Family medicine</option>
                  <option value="Surgeon">Surgeon</option>
                  <option value="Radiologist">Radiologist</option>
                  <option value="Neurologist">Neurologist</option>

                     </select>
                     </div> 
 
      <div class="label-field">
        <label for="password">Create Password:</label>
        <input type="password" class="input-field" placeholder="Create Password" name="doctor_password" id="password" required>
      </div>
      <div class="label-field">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required >
        <span id="confirm-password-error"></span>
      </div>
      <div class="label-field">
        <label for="image">Upload image</label>
        <input type="file"  name="image" id="image" accept="image/*" required>
      </div>
      <button type="submit" class="signup-btn">Add Doctor</button>
      <br>
      <br>
    </form>
</div>
</center> 
</div>

  </body>
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
    $doctorEmail = $_POST['email'];
    $doctorPassword = $_POST['doctor_password'];

    $subject = 'Welcome to Our Doctor Appointment Booking System';
    $message = "Dear Dr.$full_name,\n\nYour email: $doctorEmail\nYour password: $doctorPassword\n\nWelcome to our system!";

    sendEmail($doctorEmail, $subject, $message);
}
?>
