<?php
include '../connection.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
  // Redirect to the login page
  header('Location: index.php');
  exit();
}
?>

<html>

<head>
  <title>Doctor Appointment System</title>
  <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: poppins;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="admin-dashboard.php">Doctor Appointment Booking System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="admin-profile.php">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="admin-logout.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>
  <div id="wrapper" class=" d-flex mt-2">
    <div class="h-screen bg-gray-100 w-52 px-2 ">
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="../admin/dashboard.php ">
            <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="patient-details.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Patients</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="doctor-details.php">
            <i class="fa-solid fa-user-doctor"></i>
            <span>Doctors</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-book"></i>
            <span>Bookings</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="contact-view.php">
              <i class="fas fa-fw fa-comments"></i>
              <span>Contact</span>
          </a>
      </li>
      </ul>
    </div>
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../inc/nav.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Contact Us</li>
      </ol>




      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table" style="padding: 10px;;"></i>
          Contact us
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              include '../connection.php';
              $sql = "SELECT * FROM contactus";
              $result = mysqli_query($con, $sql);
              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $id = $row['c_id'];
                  $c_name = $row['c_name'];
                  $c_email = $row['c_email'];
                  $c_message = $row['c_message'];

         




                  echo '<tr>
            <th>' . $id . '.</th>
            <td>' . $c_name . '</td>
            <td>' . $c_email . '</td>
            <td class=""><div style="width:400px;">' . $c_message . '</td>
            <td>
            <a class="btn btn-danger p-1 ml-1" href="delete-contact.php?id=' . $id . '" role="button">Delete</a>
          


            </td>
          </tr>';
                }
              }
              ?>

            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">
        </div>

        <!--   -->

      </div>
    </div>
</body>



</html>