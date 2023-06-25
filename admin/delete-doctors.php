<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM doctors WHERE d_id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
       header('location:doctor-details.php');
    } else {
        echo "Error deleting doctor record: " . mysqli_error($con);
    }
} else {
    echo "Doctor ID not specified";
}
?>
