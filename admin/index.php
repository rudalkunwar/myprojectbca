<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
	<style>
			body{
background-image: url(../images/b4.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  height: 100%;
		}
		.alert{
			color:red;
			font-size:14px;
margin-top:4px;

margin-bottom:4px;}
	</style>
</head>
<?php
$error = ''; // Initialize $error with an empty string



	session_start();
	include '../connection.php';
	include '../adminheader.php';


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the input values from the login form
        $a_email = $_POST['a_email'];
        $a_pass = $_POST['a_pass'];


  // Query your database to check if the email and password match with the data stored for admin credentials
  $sql = "SELECT * FROM admin WHERE a_email='$a_email' AND a_pass='$a_pass'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
	// If the email and password match, set a session variable to indicate that the admin is logged in and redirect the admin to the admin dashboard
	$_SESSION['loggedIn'] = true;
	$_SESSION['a_email']=$a_email;
	

	header("location: dashboard.php");
	exit();
	
  
  }
  else{
	$error = '<label for="promter" class="alert">Wrong credentials! Invalid email or password</label>';
} 
	}


	?>
<body>
	<div class="login-box">
		<h1>Admin Login</h1>

		
		<form method="post">
		<?php echo $error; ?> 
			<label for="a_email">Email:</label>
			<input type="email" id="a_email" name="a_email" placeholder="Enter your email">
			<label for="a_pass">Password:</label>
			<input type="password" id="a_pass" name="a_pass" placeholder="Enter your password">
			<button type="submit" class="btn" name="btn">Login</button>
		</form>
	</div>
</body>
</html>
