
<?php
// Start a session to store logged-in status
session_start();

$error = ' ';
// Connect to your database
include '../connection.php';

// Create a login page
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the email and password entered by the admin
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query your database to check if the email and password match with the data stored for admin credentials
  $sql = "SELECT * FROM doctors WHERE email='$email' AND doctor_password='$password'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
	// If the email and password match, set a session variable to indicate that the admin is logged in and redirect the admin to the admin dashboard
	$_SESSION['loggedIn'] = true;
	$_SESSION['email']=$email;
	$_SESSION['full_name']=$full_name;


	header("location: doctor-dashboard.php");
	exit();
  } else {
	// If the email and password don't match, show an error message and prompt the admin to try again

	$error = '<label for="promter" class="alert">Wrong credentials! Invalid email or password</label>';


}
  
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
  <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/login.css">
	<style>
			body{
background-image: url(images/b4.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  height: 100%;
		}
		.error {
	color: red;
	font-weight: bold;
	margin-top: 10px;
}
.alert{
	margin: 2px;
	font-size: 14px;
	color: red;
}
	</style>
</head>
<body>
<?php
include '../header.php';
?>
	<div class="login-box">
		<h1>Doctor Login</h1>
		<form method="post">
		<?php echo $error; ?> 
			<label for="email" style="margin-top: 8px;">Email:</label>
			<input type="email" id="email" name="email" placeholder="Enter your email">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Enter your password">
		  <button type="submit" class="btn" name="btn">Login</button>

			<!-- <div class="signup-link"><br>
				<p style="text-align: center;"><a href="signup.php" style="text-decoration: none; color:crimson;">Forgot Password?</a></b></p>
				
			</div> -->
		</form>
	</div>
</body>
</html>
