<?php

include('connect.php');
session_start();

//getting logged in customer details
$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
$today_date = getdate();

if (isset($_POST['submit'])) {

    $car = mysqli_real_escape_string($conn, $_POST['manu']);
    $fuelType = mysqli_real_escape_string($conn, $_POST['fType']);
    $carType = mysqli_real_escape_string($conn, $_POST['Type']);
    $year = $_POST['year'];
    $serviceType =  mysqli_real_escape_string($conn, $_POST['level']);
    $getPrice = $_COOKIE['price'];

    $insert = "INSERT INTO `quotes` (quoteCusId, quoteCarType, quotePrice, quoteDate, quoteFuelType, quoteYear, quoteVehicleType) VALUES ('$customer_id', '$car', '$getPrice', '$todayDate', '$fuelType', '$year', '$carType')";

    mysqli_query($conn, $insert) or die('query failed');
}


?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="Width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <div class="sectionQuote">
        <div class="quoteForm">
            <form action="#" id="request-quote">
                <div class="form-group">
                    <label for="type" class="type">Type:</label>
                    <select name="car-type" id="type" class="form-control">
                        <option value="">Select</option>
                        <option value="Light">Light Motor Vehicle</option>
                        <option value="Truck">Truck</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fueltype" class="fueltype">Fuel Type:</label>
                    <select name=fuel-type" id="ftype" class="form-control">
                        <option value="">Select</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Electric/Hybrid">Electric/Hybrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="manufact" class="manufact">Manufacturer:</label>
                    <select name="car-manu" id="manu" class="form-control">
                        <option value="">Select</option>
                        <option value="1">Alfa Romeo</option>
                        <option value="2">Audi</option>
                        <option value="2">BMW</option>
                        <option value="2">Cadillac</option>
                        <option value="3">CAM</option>
                        <option value="1">Chana</option>
                        <option value="1">Chery</option>
                        <option value="3">Chevrolet</option>
                        <option value="1">Chrysler</option>
                        <option value="3">Citreon</option>
                        <option value="2">Daewoo</option>
                        <option value="2">Daihatsu</option>
                        <option value="2">Datsun</option>
                        <option value="1">Dodge</option>
                        <option value="1">FAW</option>
                        <option value="1">Ferrari</option>
                        <option value="3">Fiat</option>
                        <option value="2">Ford</option>
                        <option value="1">Foton</option>
                        <option value="1">Geely</option>
                        <option value="1">Gonow</option>
                        <option value="2">GWM</option>
                        <option value="2">Haval</option>
                        <option value="2">Honda</option>
                        <option value="2">Hummer</option>
                        <option value="3">Hyundai</option>
                        <option value="1">Infiniti</option>
                        <option value="2">Isuza</option>
                        <option value="2">Iveco</option>
                        <option value="1">Jaguar</option>
                        <option value="1">Jeep</option>
                        <option value="2">Jinbei</option>
                        <option value="3">Kia</option>
                        <option value="2">Land Rover</option>
                        <option value="2">Lexus</option>
                        <option value="2">Mahindra</option>
                        <option value="1">Maserati</option>
                        <option value="3">Mazda</option>
                        <option value="2">Mercedes-Benz</option>
                        <option value="3">MG</option>
                        <option value="2">Mini</option>
                        <option value="2">Mitsubishi</option>
                        <option value="1">Nissan</option>
                        <option value="3">Opel</option>
                        <option value="3">Peugeot</option>
                        <option value="1">Porche</option>
                        <option value="3">Proton</option>
                        <option value="3">Renault</option>
                        <option value="2">Subaru</option>
                        <option value="2">Suzuki</option>
                        <option value="3">Tata</option>
                        <option value="2">Toyota</option>
                        <option value="2">Volkswagen</option>
                        <option value="2">Volvo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="years" class="years">Year:</label>
                    <select name="year" id="year" class="form-control">
                        <option value="">Select</option>
                    </select>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-legend col-12">Service Type</legend>

                        <div class="col-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" name="level" class="form-check-input" value="basic" checked>
                                    Basic
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" name="level" class="form-check-input" value="major">
                                    Major
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div id="loading">
                    <img src="./images/car-wheel.gif" alt="loading">
                </div>
                <div id="result"></div>
                <a class="book-quote" id="book" href="booking.php">Book Service Now?</a>
                <div class="form-group">
                    <button type="submit" class="btn btn-raised btn-prmary">Get Quote</button>
                </div>
            </form>
        </div>
    </div>

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


    <script type="text/javascript" src="javascript/app.js"></script>
</body>

</html>