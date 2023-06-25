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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>

* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: poppins;
}

.login-box {
  /* background-image: url(../images/b4.jpg); */
width: 400px;
 background: #fff; 
padding: 40px;
position: absolute;
top: 20%;
left: 40%;
border-radius: 5px;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

h1 {
text-align: center;
font-size: 32px;
margin-bottom: 20px;
}

form {
display: flex;
flex-direction: column;
}

label {
font-size: 14px;
margin-bottom: 5px;
}

input[type="email"],
input[type="password"], 
input[type="date"], 
input[type="text"]{
padding: 8px;
margin-bottom: 20px;
border-radius: 5px;
border: none;
box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
outline: none;
border: 1px solid crimson;
}



button.btn1 {
background: rgb(223, 55, 88);
color: #fff;
padding: 10px;
border: none;
border-radius: 5px;
cursor: pointer;
}

button.btn1:hover {
background:crimson;
color: white;
}

button.btn1:focus {
outline: none;
}
.h2text{
  margin-bottom: 10px;
  text-align: center;
  font-size: 20px;
}

  </style>
  </head>
  <body>
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

<a class="navbar-brand mr-1" href="admin-dashboard.php">Admin Panel</a>

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
   <div class="h-screen bg-gray-100 w-52 px-2 " >
   <ul class="sidebar navbar-nav">
      <li class="nav-item active">
          <a class="nav-link" href="../admin/dashboard.php ">
              <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="../admin/patient-details.php" >
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

      <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <div class="login-box">
      <div class="h2text">
      <h1>Change Password</h1>
      </div>
    <form method="post" action="change_password.php">
        <label for="newpassword" style="margin-top: 8px;">New Password:</label>
        <input type="password" id="newpassword" name="newpassword" required>
        <label for="c_newpassword">Confirm Password:</label>
        <input type="password" id="c_newpassword" name="c_newpassword" required>
        <button type="submit" class="btn1" name="btn1">Change password</button>
        </div>
    </form>
</div>
    </div>
</div>

  

     
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

