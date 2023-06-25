<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prabhat Ghimire</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/4bdfc3de41.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/8544f6f880.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/be7d3971df.js" crossorigin="anonymous"></script>

  <style>
    *{
	margin: 0;
	padding: 0;
	font-family: 'poppins',sans-serif;
	box-sizing: border-box;
}
html{
	scroll-behavior: smooth;
	
}
.container-header{
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
<body>
	<div class="container-header">
		<nav>
			<h4 style="color:white; padding:10px">CMC</h4>
		<!---<img src="images/logo1.png" width="100px" height="60px" alt="Logo">--->
    <ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../about.php">About</a></li>
                <li><a href="../contact.php">Contact us</a></li>
			</ul>
			<ul>
				<li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>
			</ul>
		</nav>
  </div>
  
