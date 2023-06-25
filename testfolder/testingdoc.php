<?php
include '../header.php';
include '../connection.php';

$doctors = [];
$query = "SELECT * FROM doctors";
$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;
    }
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Profile Cards | CodingLab</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        ::selection {
            background: #8e44ad;
            color: #fff;
        }

        body {
            background-color: #17c0eb;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

.container .box {
    width: calc(20% - 20px);
    background: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
    align-items: center; /* Center content horizontally */
    padding: 10px 20px;
    border-radius: 5px;
    margin: 10px;
}


        .box .image {
            margin: 10px 0;
            height: 150px;
            width: 150px;
            background: #8e44ad;
            padding: 3px;
            border-radius: 50%;
        }

        .box .image img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
        }

        .box p {
            text-align: justify;
            margin-top: 8px;
            font-size: 16px;
            font-weight: 400;
        }

        .box .name_job {
            margin: 10px 0 3px 0;
            color: #8e44ad;
            font-size: 18px;
            font-weight: 600;
        }

        .btns {
            margin-top: 20px;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .btns button {
            background: #8e44ad;
            width: 100%;
            padding: 9px 0px;
            outline: none;
            border: 2px solid #8e44ad;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 400;
            color: #8e44ad;
            transition: all 0.3s linear;
        }

        .btns button:first-child {
            background: none;
            margin-right: 5px;
        }

        .btns button:last-child {
            color: #fff;
            margin-left: 5px;
        }

        .btns button:first-child:hover {
            background: #8e44ad;
            color: #fff;
        }

        .btns button:hover {
            color: #fff;
        }

        @media (max-width:1045px) {
            .container .box {
                width: calc(50% - 10px);
                margin-bottom: 20px;
            }
        }

        @media (max-width:710px) {
            .container .box {
                width: 100%;
            }
        }

        .box p {
            text-align: left;
            margin-top: 8px;
            font-size: 16px;
            font-weight: 400;
        }
    </style>
</head>
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
                <button>Book Now</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
