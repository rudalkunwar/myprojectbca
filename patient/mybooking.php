<?php
include '../connection.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Redirect to the login page
    header('Location: ../login.php');
    exit();
}
$full_name = isset($_GET['name']) ? $_GET['name'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Doctor Appointment System</title>
    <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/displaydoctor.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-wgRSQh65w1Wvca0ElzgBlkZ7G1e0YL9p1q0jbZFYBn3e1sLneN9ghePL9O4JH5hRSf7Rx5aUIV6BCR56EBU2Zg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <style>
        /* .container{
      background-color: blue;
    } */
        body {
            background-color: blue;
        }

        .container-pdash {
            background-color: crimson;
            /* padding: 5px; */
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        ul li {
            margin-right: 20px;
        }

        a {
            color: white;
            text-decoration: none;
        }

        .card-icon {
            font-size: 20px;
            cursor: pointer;
        }

        .dropdown-menu {
            position: absolute;
            transform: translateX(-50%);
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: none;
        }

        .dropdown-menu li a {
            color: #333;
            text-decoration: none;
            display: inline-block;
        }

        .dropdown-menu.show {
            display: block;
        }

        /* Add styling for the search input */
        .search-input {
            border: none;
            /* background-color: transparent; */
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px;
            border-radius: 4px;
            outline: none;
            transition: background-color 0.3s ease;
            width: 200px;
        }

        .search-input:focus {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .search-input::placeholder {
            color: white;
        }

        .search-button {
            background-color: transparent;
            border: none;
            padding: 8px;
            cursor: pointer;
        }

        .search-icon {
            color: white;
        }

        #myInput {
            padding: 20px;
            margin-top: -6px;
            border: 0;
            border-radius: 0;
            background: #f1f1f1;
        }

        /* Popup Booking Form CSS  */
        .my-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(4px);
            /* Add backdrop-filter property to apply blur */
        }



        .my-modal-dialog {
            position: relative;
            margin: 10% auto;
            width: 80%;
            max-width: 500px;
        }

        .my-modal-content {
            background-color: #fff;
            border-radius: 4px;
            width: 70%;
            /* Adjust the width as desired */
            margin: 0 auto;
            /* Center the modal horizontally */
        }



        .my-modal-header {
            padding: 15px;
            background-color: #f2f2f2;
            border-bottom: 1px solid #ddd;
        }

        .my-modal-title {
            margin: 0;
            font-size: 24px;
        }

        .my-modal-body {
            padding: 20px;
        }

        .my-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .my-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .my-button:hover {
            background-color: #0056b3;
        }

        .my-close-button {
            position: absolute;
            top: 0;
            right: 75px;
            padding: 10px;
            color: #000;
            opacity: 0.5;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        .my-close-button:hover {
            opacity: 1;
        }

        .container {
            /* margin-top: 50px; */
        }

        .section {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="container-pdash">
        <nav>
            <h3></h3>
            <ul>
                <li><a href="patient-dashboard.php">Home</a></li>
                <li><a href="#">My Bookings</a></li>
                <li><a href="../contact.php">Contact us</a></li>

                <li>
                    <div class="form-group w-25">
                        <input type="text" id="searchInput" class="search form-control" placeholder="Search Doctor" style="outline: none; padding: 4px;">

                    </div>
                </li>
                <div class="logoutpanel" style="align-items: center; justify-content:center; display:flex; text-align:right;">
                    <a href="patient-logout.php">Logout</a>
                </div>
            </ul>
            <ul>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="section">
            <h1>My Bookings</h1>
            <div class="table-container">
                <table id="appointmentsTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Preferred Date</th>
                            <th>Doctor ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $bookings = [];
                        $query = "SELECT * FROM bookings";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $bookings[] = $row;
                            }
                        }
                        foreach ($bookings as $booking) {
                            echo "<tr>";
                            echo "<td>" . $booking['full_name'] . "</td>";
                            echo "<td>" . $booking['email'] . "</td>";
                            echo "<td>" . $booking['preferred_date'] . "</td>";
                            echo "<td>" . $booking['d_id'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#appointmentsTable').DataTable();
            });
        </script>
</body>

</html>