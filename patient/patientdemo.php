<?php
include '../connection.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
  // Redirect to the login page
  header('Location: ../login.php');
  exit();
}
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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
  </style>
</head>

<body>
  <div class="container-pdash">
    <nav>
      <h4 style="color:white;">Welcome Prabhat!</h4>
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="#">My Bookings</a></li>
        <li><a href="../contact.php">Contact us</a></li>

        <li>
          <form action="#">
            <input type="text" placeholder="Search Doctor here..." class="search-input">
            <button type="submit" class="search-button">
              <i class="fas fa-search search-icon"></i>
            </button>
          </form>
        </li>
      </ul>
      <ul>
        <li class="dropdown">
          <span class="far fa-user card-icon" id="user-icon"></span>
          <div class="dropdown-menu" id="dropdown-menu">
            <ul>
              <li class="dropdown">
                <a href="#">Profile</a>
                <a href="patient-logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
  </div>

  <?php
  $doctors = [];
  $query = "SELECT * FROM doctors";
  $result = mysqli_query($con, $query);

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $doctors[] = $row;
    }
  }
  ?>

  <div class="container">
    <?php foreach ($doctors as $doctor) : ?>
      <div class="box">
        <div class="image">
          <img src="../doctor-images/<?php echo $doctor['image_path']; ?>">
        </div>
        <div class="name_job"><?php echo $doctor['full_name']; ?></div>
        <p><i class="fa-solid fa-user-doctor p-1"></i> <?php echo $doctor['specialist']; ?></p>
        <p><i class="fa-solid fa-phone p-1"></i> <?php echo $doctor['phone']; ?></p>
        <div class="btns">
          <button type="submit" onclick="show();" class="btn btn-primary">Book Now</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="popupLabel">Book Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-group">
              <label for="full_name">Name:</label>
              <input type="text" id="full_name" name="full_name" value="<?php echo $_SESSION['full_name']; ?>" placeholder="Enter your name" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $_SESSION['email']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control">
            </div>
            <div class="form-group">
              <label for="date">Date of Appointment:</label>
              <input type="date" id="date" name="date" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Book Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  const userIcon = document.getElementById('user-icon');
  const dropdownMenu = document.getElementById('dropdown-menu');

  userIcon.addEventListener('click', function() {
    dropdownMenu.classList.toggle('show');
  });

  // Close the dropdown menu if the user clicks outside
  window.addEventListener('click', function(event) {
    if (!event.target.matches('.card-icon')) {
      if (dropdownMenu.classList.contains('show')) {
        dropdownMenu.classList.remove('show');
      }
    }
  });
</script>

<script>
  function show() {
    $('#popup').modal('show');
  }

  function hide() {
    $('#popup').modal('hide');
  }
</script>

</html>
