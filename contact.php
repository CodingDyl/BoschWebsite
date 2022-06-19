<?php

include('connect.php');
session_start();

$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
$customer_email = $_SESSION['customer_email'];

if (isset($_POST['submit'])) {
    $number = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email_second = mysqli_real_escape_string($conn, $_POST['email-second']);

    $find_email = mysqli_query($conn, "SELECT * FROM `customers` WHERE cusEmail = '$email_second' AND cusId = '$customer_id'");

    if (mysqli_num_rows($find_email) > 0) {
        mysqli_query($conn, "UPDATE `customers` SET cusNumber = '$number' WHERE cusId = '$customer_id'");
        $message[] = "number added to database";
    } else {
        $message[] = "User doesn't exist";
    }

    // -------------- Going to post message to admin page and email ---------------
}


?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="Width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/banner.css">
    <title>Bosch Website</title>

</head>

<body>

    <nav>
        <div class="logo">
            <img src="./images/Bosch_Logo.png" alt="" class="logoImg">
            <h4>Northcliff Auto</h4>
            <h6>Proud member of Bosch Car Service</h6>
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="quote.php">Get A Quote</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message">
                      <span>' . $message . '</span>
                      <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
                    </div>
                   ';
        }
    }

    ?>

    <section class="contact">
        <img src="./images/bg2.avif" alt="">
        <div class="content">
            <h2>contact us</h2>
            <p>At Northcliff Auto we service all vehicle makes and models. Our team of dedicated mechanics constantly strive to ensure your vehicle is effectively serviced, repaired and maintained so that it’s driving at its best.</p>
        </div>
        <div class="contactContainer">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>51 14th Avenue, <br> Northcliff, <br> Johannesburg, 2195</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>011 431 3710 / 065 878 5101</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>admin@boschnc.co.za</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form action="" method="post">
                    <h2>get in touch</h2>
                    <div class="inputbox">
                        <input type="text" name="name-contact" id="name-contact" required>
                        <span>Full Name</span>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="email-second" id="email-second" required>
                        <span>Email Address</span>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="mobile" id="mobile" required>
                        <span>Mobile Number</span>
                    </div>
                    <div class="inputbox">
                        <textarea required="required" name="msg" id="msg"></textarea>
                        <span>Type Your Message...</span>
                    </div>
                    <div class="inputbox">
                        <input type="submit" value="Send" name="send" onsubmit="sendEmail(); reset(); return false">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footHeading">
            <h2>bosch car service now in northcliff</h2>
            <p>We are always happy to help. Get in touch with us today. Contact our experienced manager Jacques Petzer on 011 431 3710 or 065 878 5101.</p>
        </div>
        <div class="socials">
            <div class="socialBox" id="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div>
            <div class="socialBox" id="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></div>
        </div>
        <div class="footClose">
            <h2>© 2022 northcliff auto</h2>
        </div>
    </footer>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail() {
            Email.send({
                Host: "smtp.gmail.com",
                Username: "2610dylan@gmail.com",
                Password: "2101taryn",
                To: '2610dylan@gmail.com',
                From: document.getElementById('email-second').value,
                Subject: "New Contact Form Enquiry",
                Body: "Name: " + document.getElementById('name-contact').value + "<br> Email: " + document.getElementById('email-second').value + "<br> Number: " + document.getElementById('number').value + "<br> Message: " + document.getElementById('msg').value

            }).then(
                message => alert("Message Sent Successfully")
            );
        }
    </script>

</body>

</html>