<?php
session_start();

include '../connection.php';

// Check if the user is not logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Redirect to the login page
    header('Location: ../index.php');
    exit();
}

// Retrieve form data
$newPassword = $_POST['newpassword'];
$confirmPassword = $_POST['c_newpassword'];

// Validate the input (you can add more validation as per your requirements)
if ($newPassword !== $confirmPassword) {
    die("New password and confirm password do not match.");
}

// Update the password in the database for the logged-in admin
$adminEmail = $_SESSION['a_email']; // Assuming you have stored the admin's email in the session
$updateQuery = "UPDATE admin SET a_pass = '$newPassword' WHERE a_email = '$adminEmail'";
$updateResult = mysqli_query($con, $updateQuery);

if ($updateResult) {
    echo "Password updated successfully.";
} else {
    echo "Failed to update password.";
}
header('location: ./index.php');
// Close the database connection
mysqli_close($con);
?>
