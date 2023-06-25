

<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  // Create SQL SELECT statement
  $sql = "SELECT * FROM doctors WHERE d_id = $id";

  // Execute the SQL statement
  $result = mysqli_query($con, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the doctor record
    $doctor = mysqli_fetch_assoc($result);

    // Rest of your update logic goes here
    // ...
?>

<!-- Update Form -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Doctor</title>
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
<center>
        <div class="signup-box">
          <form action="" method="post" enctype="multipart/form-data">
            <h2 class="header-text" style="text-align: center;">Update Doctor</h2>
            <div class="label-field">
              <label for="full_name">Full Name:</label>
              <input type="text" class="input-field" placeholder="Full Name" name="full_name" id="full_name" value="<?php echo $doctor['full_name']; ?>" required autocomplete="off">
            </div>
            <div class="label-field">
              <label for="address">Address:</label>
              <input type="text" class="input-field" placeholder="Address" name="address" id="address" value="<?php echo $doctor['address']; ?>" required autocomplete="off">
            </div>
            <div class="label-field">
              <label for="email">Email:</label>
              <input type="email" class="input-field" placeholder="Email" name="email" id="email" value="<?php echo $doctor['email']; ?>" required autocomplete="off">
            </div>
            <div class="label-field">
              <label for="phone">Mobile Number:</label>
              <input type="text" class="input-field" placeholder="Mobile Number" name="phone" id="phone" value="<?php echo $doctor['phone']; ?>" required autocomplete="off">
            </div>
            <div class="label-field">
              <label for="option">Speciality:</label>
              <select class="custom-select" name="specialist" style="width: 100%; padding:8px; border-radius:6px; outline:none;border:1px solid crimson;margin-top:3px;" required>
                <option selected disabled>Select Speciality</option>
                <option value="Dermatologist" <?php if ($doctor['specialist'] == "Dermatologist") echo 'selected'; ?>>Dermatologist</option>
                <option value="Cardiologist" <?php if ($doctor['specialist'] == "Cardiologist") echo 'selected'; ?>>Cardiologist</option>
                <option value="Infectious Disease" <?php if ($doctor['specialist'] == "Infectious Disease") echo 'selected'; ?>>Infectious Disease</option>
                <option value="Psychiatrist" <?php if ($doctor['specialist'] == "Psychiatrist") echo 'selected'; ?>>Psychiatrist</option>
                <option value="Family Medicine" <?php if ($doctor['specialist'] == "Family Medicine") echo 'selected'; ?>>Family Medicine</option>
                <option value="Surgeon" <?php if ($doctor['specialist'] == "Surgeon") echo 'selected'; ?>>Surgeon</option>
                <option value="Radiologist" <?php if ($doctor['specialist'] == "Radiologist") echo 'selected'; ?>>Radiologist</option>
                <option value="Neurologist" <?php if ($doctor['specialist'] == "Neurologist") echo 'selected'; ?>>Neurologist</option>
              </select>
            </div>
            <div class="label-field">
              <label for="password">Create Password:</label>
              <input type="password" class="input-field" placeholder="Create Password" name="doctor_password" id="password" required value="<?php echo $doctor['doctor_password']; ?>" >
            </div>
            <div class="label-field">
              <label for="confirm_password">Confirm Password:</label>
              <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required value="<?php echo $doctor['confirm_password']; ?>">
            </div>
            <div class="label-field">
              <label for="image">Upload image</label>
              <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="signup-btn">Update Doctor</button>
            <br>
            <br>
          </form>
        </div>
      </center>
  </form>
</body>

</html>
<?php
  } else {
    echo "Doctor not found";
  }
}

// Update doctor record in the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve form data
  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $specialist = $_POST['specialist'];
  $doctor_password = $_POST['doctor_password'];
  $confirm_password = $_POST['confirm_password'];
  $imagePath = "../doctor-images/" . $_FILES["image"]["name"];

  // Move uploaded image file into folder
  move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

  $sql = "UPDATE doctors SET full_name='$full_name', address='$address', email='$email', phone='$phone', specialist='$specialist', doctor_password='$doctor_password', confirm_password='$confirm_password', image_path='$imagePath' WHERE d_id=$id";

  if (mysqli_query($con, $sql)) {
    echo "Doctor record updated successfully";
    header('location: doctor-details.php');
  } else {
    echo "Error updating record: " . mysqli_error($con);
  }
}

include('../connection.php');
?>
<!-- php mail -->
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