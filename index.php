<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doctor Appointment Booking System</title>
  <link rel="stylesheet" href="css/index.css">
  <style>
    
body{

  color: black;
background-image: url(images/bg6.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  height:100%;



}
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.full-height {
height: 100%;

}

.content-container {
margin-top: 180px;
max-width: 600px;
}

.heading-text {
font-size: 38px;
font-weight: bold;
margin-bottom: 20px;
margin-right:130px;
}

.sub-text2 {
font-size: 18px;
margin-bottom: 20px;
line-height: 1.5;
margin-right:130px;

}

.button-container {
margin-top: 3px;
}

.login-link {
text-decoration: none;
}

.login-btn {
padding: 10px;
background-color:crimson;
color: white;
padding: px;
border: none;
border-radius: 5px;
cursor: pointer;
font-size: 14px;
margin-right:130px;
}

.login-btn:hover {
background-color: crimson;
}

.footer-index {
margin-top: 50px;
font-size: 14px;
color: #999;

}

  </style>
</head>
<body>
    <?php
    include 'header.php';
    ?>
<div class="full-height">
  <center>
    <div class="content-container">
      <p class="heading-text" >Avoid Hassles &amp; Delays.</p>
      <p class="sub-text2">How is health today, Sounds like not good!
Don't worry. Find your doctor online Book as you wish with our project
We offer you a free doctor booking service, Make your appointment now.</p>
      <div class="button-container">
        <a href="login.php" class="login-link">
          <button class="login-btn">Make Appointment</button>
        </a>
      </div>
    </div>
  </center>
</div>
</body>
</html>
