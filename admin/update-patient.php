<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  // Create SQL SELECT statement
  $sql = "SELECT * FROM patients WHERE p_id = $id";

  // Execute the SQL statement
  $result = mysqli_query($con, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the patient record
    $patient = mysqli_fetch_assoc($result);
  } else {
    echo "Patient not found";
    exit;
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Create SQL UPDATE statement
  $sql = "UPDATE patients SET full_name='$full_name', address='$address', email='$email', phone='$phone', dob='$dob', password='$password', confirm_password='$confirm_password' WHERE p_id=$id";

  // Execute the SQL statement
  if (mysqli_query($con, $sql)) {
    echo "Patient record updated successfully";
    header('location: patient-details.php');
    exit;
  } else {
    echo "Error updating record: " . mysqli_error($con);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Update Patient</title>
  <link rel="stylesheet" href="../css/signup.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>

  <style>
    *{
      font-family: poppins;
    }
    body {
      background-image: url(../images/b4.jpg);
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
<body>
  <center>
    <div class="signup-box">
      <form onsubmit="return validateForm()" action="" method="post">
        <h3 class="header-text" style="text-align: center;">Update Patient</h3>
        <p class="header-subtext" style="text-align: center;">Update the patient's personal details</p>
        <div id="errorContainer" class="alert alert-danger p-2 text-danger" role="alert" style="display: none;"></div>
        <div class="label-field">
          <label for="full_name">Full Name:</label>
          <input type="text" class="input-field" placeholder="Full Name" name="full_name" id="full_name" value="<?php echo $patient['full_name']; ?>">
        </div>
        <div class="label-field">
          <label for="address">Address:</label>
          <input type="text" class="input-field" placeholder="Address" name="address" id="address" value="<?php echo $patient['address']; ?>">
        </div>
        <div class="label-field">
          <label for="email">Email:</label>
          <input type="email" class="input-field" placeholder="Email" name="email" id="email" value="<?php echo $patient['email']; ?>">
        </div>
        <div class="label-field">
          <label for="phone">Mobile Number:</label>
          <input type="text" class="input-field" placeholder="Mobile Number" name="phone" id="phone" value="<?php echo $patient['phone']; ?>">
        </div>
        <div class="label-field">
          <label for="dob">Date of Birth:</label>
          <input type="date" class="input-field" placeholder="Date" name="dob" id="dob" value="<?php echo $patient['dob']; ?>">
        </div>
        <div class="label-field">
          <label for="password">Create Password:</label>
          <input type="password" class="input-field" placeholder="Create Password" name="password" id="password" value="<?php echo $patient['password']; ?>">
        </div>
        <div class="label-field">
          <label for="confirm_password">Confirm Password:</label>
          <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="<?php echo $patient['confirm_password']; ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $patient['p_id']; ?>">
        <button type="submit" class="signup-btn">Update Patient</button>
        <br>
        <p class="text-2" style="text-align:center; margin-top:5px; font-size:16px;">Already have an account? <a href="login.php" style="text-decoration: none; color:crimson;"><b>Login</b></a></p>
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

  if (errorMessage) {
    errorContainer.style.display = "block"; // Show the error container
  } else {
    errorContainer.style.display = "none"; // Hide the error container
  }
}
</script>

</html>
