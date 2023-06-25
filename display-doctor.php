

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available Doctors</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
::selection{
  background: #8e44ad;
  color: #fff;
}
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: #f5f5f5; */
            background-image: url(images/b3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
        
        }
.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

/* .container .box {
  width: calc(20% - 20px);
  background: #fff;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 10px 20px;
  border-radius: 5px;
  margin: 10px;
} */


  .container .box {
    width: calc(20% - 20px);
    background: #fff;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Align content to the top */
    align-items: flex-start; /* Align items to the left */
    padding: 10px 20px;
    border-radius: 5px;
    margin: 10px;
  }

  /* ... Your existing CSS styles ... */




/* .container{

  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}


.container .box{
  width: calc(33% - 10px);
  background: #fff;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 20px 30px;
  border-radius: 5px;
} */
/* .box .quote i{
margin-top: 10px;
font-size: 45px;
color: #17c0eb
} */
.container .box .image{
  text-align: center;
  margin: 10px 0;
  height: 150px;
  width: 150px;
  background: #8e44ad;
  padding: 3px;
  border-radius: 50%;
}

    .image {
        text-align: center;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

.box .image img{
  height: 100%;
  width: 100%;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #fff;
}
.box p{
  text-align: justify;
  margin-top: 8px;
  font-size: 16px;
  font-weight: 400;
}
.box .name_job{
  margin: 10px 0 3px 0;
  color: #8e44ad;
  font-size: 18px;
  font-weight: 600;
}
.btns{
  margin-top: 20px;
  margin-bottom: 5px;
  display: flex;
  justify-content: space-between;
  width: 100%;
}
.btns button{
  padding: 5px;
 background-color: crimson;
  width: 100%;
  outline: none;
  border: 2px solid crimson;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  font-weight: 400;
  color: #fff;
  transition: all 0.3s linear;
}
.btns button:hover{
  color: #fff;
}
@media (max-width:1045px){
  .container .box{
    width: calc(50% - 10px);
    margin-bottom: 20px;
  }
}
@media (max-width:710px){
  .container .box{
    width: 100%;
  }
}
  /* ... Your existing CSS styles ... */

  .box p {
    text-align: left; /* Align text to the left side */
    margin-top: 8px;
    font-size: 16px;
    font-weight: 400;
  }

  /* ... Your existing CSS styles ... */


    </style>
  </head>
  <!-- <body>
    <div class="container">
      <div class="box">
      <div class="image">
        <img src="img1.jpeg">
        </div>
        <div class="name_job">David Chrish</div>
        <p> Lorem ipsum dolor sitamet, stphen hawkin so adipisicing elit. Ratione disuja doloremque reiciendi nemo.</p>
        <div class="btns">
          <button>Read More</button>
          <button>Subscribe</button>
        </div>
      </div>
    </div>
      </body> -->
      <?php
include 'connection.php';
 include 'header.php';

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
    <div class="container">
        <?php foreach ($doctors as $doctor): ?>
        <div class="box">
            <div class="image">
                <img src="doctor-images/<?php echo $doctor['image_path']; ?>">
            </div>
            <div class="name_job"><?php echo $doctor['full_name']; ?></div>
            <p><i class="fa-solid fa-user-doctor p-1"></i> <?php echo $doctor['specialist']; ?></p>
            <p><i class="fa-solid fa-phone p-1"></i> <?php echo $doctor['phone']; ?></p>
            <div class="btns">
     <a href="login.php" style="width: 100%;"><button type="submit"> Book Now</button></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>