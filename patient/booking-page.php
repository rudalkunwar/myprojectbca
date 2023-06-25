<?php
include '../connection.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
  // Redirect to the login page
  header('Location: ../login.php');
  exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data

  $doctor_name = $_POST['docname'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $preferred_date = $_POST['date'];
  $d_id = $_POST['docid'];

  // Validate form data (add more validation if needed)
  if (empty($full_name) || empty($email) || empty($preferred_date) || empty($d_id)) {
    // Display an error message if any field is empty
    $error = "Please fill in all the fields.";
  } else {
    // Prepare and execute the SQL query to insert the booking
    $query = "INSERT INTO bookings (full_name, email, preferred_date, d_id) VALUES ('$full_name', '$email', '$preferred_date', $d_id)";
    
    if (mysqli_query($con, $query)) {
      // Check if the booking was successfully inserted
      if (mysqli_affected_rows($con) > 0) {
        // Booking was inserted successfully
        // You can perform any additional actions or display a success message here
        
        // Redirect to the bookings page
        header('Location: bookings.php');
        exit();
      } else {
        // Failed to insert the booking
        $error = "Failed to insert the booking.";
      }
    } else {
      // Error executing the query
      $error = "Error: " . mysqli_error($con);
    }
  }
}

// Retrieve the doctor ID from the query string
$d_id = isset($_GET['d_id']) ? $_GET['d_id'] : '';

// Retrieve the doctor details based on the doctor ID
$doctor = null;
if (!empty($d_id)) {
  $query = "SELECT * FROM doctors WHERE d_id = $d_id";
  $result = mysqli_query($con, $query);

  if ($result) {
    $doctor = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
  }
}
?>
