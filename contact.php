<?php

include 'connection.php';

// Get form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_message = $_POST['c_message'];


      // Create SQL INSERT statement
      $sql = "INSERT INTO contactus(c_name, c_email, c_message) VALUES ('$c_name', '$c_email', '$c_message')";

      // Execute the SQL statement
      if (mysqli_query($con, $sql)) {
        echo "Message sent";
        header('location:contact.php');
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
    }
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <style>
        /* CSS for Contact Form */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: #f5f5f5; */
            background-image: url(images/bg5.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content {
            display: flex;
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .left-side {
            flex: 1;
            padding: 30px;
            border-right: 1px solid #ccc;
        }

        .right-side {
            flex: 1;
            padding: 30px;
        }

        .address.details,
        .phone.details,
        .email.details {
            margin-bottom: 20px;
        }

        .address.details i,
        .phone.details i,
        .email.details i {
            margin-right: 10px;
        }

        .address.details .topic,
        .phone.details .topic,
        .email.details .topic {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .topic-text {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        .input-box {
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .button {
            text-align: center;
        }

        input[type="submit"] {
            background-color: crimson;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<?php include 'header.php';
?>
<body>
    <div class="container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Bharatpur,Nepal</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+977 9742931621</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">prabhatghimire99@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any problem with this system, you can send me a message from here. It's my pleasure to help you.</p>
                <form action="#" method="post">
                    <div class="input-box">
                        <input type="text" name="c_name" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <input type="text" name="c_email" placeholder="Enter your email">
                    </div>
                    <div class="input-box message-box">
                        <textarea placeholder="Enter your message" name="c_message"></textarea>
                    </div>
                    <div class="button">
                    <input type="submit" value="Send Now">

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

function sendEmail($recipientEmail, $subject, $message) {
    // Email configurations (SMTP server, port, etc.)
    // $smtpServer = 'your_smtp_server';
    // $smtpPort = 587;
    // $smtpUsername = 'your_smtp_username';
    // $smtpPassword = 'your_smtp_password';

    $senderEmail = 'prabhatghimire99@gmail.com';

    // Compose the email headers
    $headers = "From: $senderEmail\r\n";
    $headers .= "Reply-To: $senderEmail\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    try {
        // Send the email
        if (mail($recipientEmail, $subject, $message, $headers, "-f $senderEmail")) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send the email.";
        }
    } catch (Exception $e) {
        echo "An error occurred while sending the email: " . $e->getMessage();
    }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract the email and password from the form data
    $c_name=$_POST['c_name'];
    $c_email = $_POST['c_email'];


    $subject = 'Contact Us Team Message';
    $message = "Dear $c_name,\n\n Thankyou for contacting us.We will respond you soon!";

    sendEmail($c_email, $subject, $message);
}
?>
