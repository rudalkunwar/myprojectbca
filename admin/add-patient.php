<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Add Patient</title>
  <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>
  
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

    body {
      background-color: rgb(137, 183, 90);
    }

    .signup-box {
      margin-top: 50px;
      width: 30%;
      background-color: #fff;
      padding: 10px;
      border-radius: 8px;
      justify-content: center;
      align-items: center;
      padding-bottom: 14px;

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
  </style>
</head>

<body>
  <?php
  include '../connection.php';

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
        header('location:patient-details.php');
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
    }
  }
  ?>
  <center>
    <div class="signup-box">
      <form action="" method="post">
          <h2 class="header-text" style="text-align: center;">Let's Get Started</h2>
          <p class="header-subtext" style="text-align: center;">Add your personal details</p>
          <div class="label-field">
            <label for="full_name">Full Name:</label>
            <input type="text" class="input-field" placeholder="Full Name" name="full_name" id="full_name" autocomplete="off">
          </div>
          <div class="label-field">
            <label for="address">Address:</label>
            <input type="text" class="input-field" placeholder="Address" name="address" id="address" autocomplete="off">
          </div>
          <div class="label-field">
            <label for="email">Email:</label>
            <input type="email" class="input-field" placeholder="Email" name="email" id="email" autocomplete="off">
          </div>
          <div class="label-field">
            <label for="phone">Mobile Number:</label>
            <input type="text" class="input-field" placeholder="Mobile Number" name="phone" id="phone" autocomplete="off">
          </div>
          <div class="label-field">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="input-field" placeholder="Date" name="dob" id="dob" >
          </div> 
          <div class="label-field">
            <label for="password">Create Password:</label>
            <input type="password" class="input-field" placeholder="Create Password" name="password" id="password" >
          </div>
          <div class="label-field">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" id="confirm_password" >
          </div>
          <button type="submit" class="signup-btn">Add Patient</button>
          <br>
          <br>
        

        </form>
    </div>
  </center>
</body>
</html>