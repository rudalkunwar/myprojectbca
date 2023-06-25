
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Doctors</title>
       <!-- Fonts -->
       <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: poppins;
        }
        body{
            background-image: url(../images/b4.jpg);
        }
        *{
	margin: 0;
	padding: 0;
	font-family: 'poppins',sans-serif;
	box-sizing: border-box;
}
html{
	scroll-behavior: smooth;
	
}
.headernav{
background-color: crimson;
color: black;
	}
nav{
	display: flex;
	align-items: center;
	justify-content: space-between;
	flex-wrap: wrap;
}
nav ul li{
	display: inline-block;
	list-style: none;
	margin: 10px 20px;
}
nav ul li a{
	text-decoration: none;
	font-size: 16px;
	color: white;
	position: relative;
}
nav ul li a::after{
	content:'';
	width: 0;
	height: 3px;
	background: #40e0d0;
	position: absolute;
	left: 0;
	bottom: -6px;
	transition: 0.5s;
}
nav ul li a:hover::after{
	width: 100%;
}
.fa-solid.fa-right-to-bracket{
	margin-right: 5px;
}
    </style>
</head>
 
<?php
include 'connection.php';
$doctors = [];
$query = "SELECT * FROM doctors";
$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;
    }
}
?>

<body>

<div class="headernav">
		<nav>
			<h4 style>CMC</h4>
		<!---<img src="images/logo1.png" width="100px" height="60px" alt="Logo">--->
    <ul>
				<li><a href="./index.php">Home</a></li>
				<li><a href="./display-doctor.php">Find Doctors</a></li>
				<li><a href="../about.php">About</a></li>
                <li><a href="contact.php">Contact us</a></li>
			</ul>
			<ul>
				<li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>
			</ul>
		</nav>
  </div>
    <h3 class="text-center mt-2">Available Doctors</h3>
    <div class="container">
        <div class="row row-cols-4 my-3">
            <?php foreach ($doctors as $doctor): ?>
            <div class="col">
                <div class="card" style="width: 14rem; overflow:hidden;">
                <img src="doctor-images/<?php echo $doctor['image_path']; ?>" class="card-img-top" alt="Doctor Image" style="width: 222px; height: 148px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $doctor['full_name']; ?></h5>
                        <p class="card-text"><i class="fa-solid fa-user-doctor p-1"></i> <?php echo $doctor['specialist'];?></p>
                        <p class="card-text"><i class="fa-solid fa-phone p-1"></i> <?php echo $doctor['phone'];?></p>
                        <a href="#" class="btn btn-outline-primary w-100">Book Now</a>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
