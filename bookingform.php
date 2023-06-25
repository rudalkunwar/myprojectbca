<?php
include 'connection.php';
session_start();

$full_name = ''; // Initialize the $full_name variable

if (isset($_SESSION['p_id'])) {
  $id = $_SESSION['p_id'];

  // Create SQL SELECT statement
  $sql = "SELECT * FROM patients WHERE p_id = $id";

  // Execute the SQL statement
  $result = mysqli_query($con, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the patient record
    $patient = mysqli_fetch_assoc($result);
    $full_name = $patient['full_name']; // Extract the name from the patient record
  } else {
    echo "Patient not found";
    exit;
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Remaining code...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Book Now</title>
 <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="login-box">
    <h1>Book Appointment</h1>
    <form method="post">
        <label for="name" style="margin-top: 8px;">Name: </label>
<input type="text" id="full_name" name="full_name" value="<?php echo $full_name; ?>" placeholder="Enter your name">
        <label for="email" style="margin-top: 8px;">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $_SESSION['email']; ?>">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password">
        <label for="date">Date of Appointment: </label>
        <input type="date" id="date" name="date">
        <button type="submit" class="btn" name="btn">Book Now</button>
    </form>
</div>
</body>
</html>
