
<?php
include '../connection.php';

// Get the id value from the URL
$id = $_GET['id'];

// Write the SQL DELETE statement
$sql = "DELETE FROM contactus WHERE c_id = $id";

// Execute the SQL statement
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
  // Redirect the user to the patients page
  header("Location: contact-view.php");
  exit();
} else {
  // Display an error message
  echo "Error deleting record: " . mysqli_error($con);
}
?>
