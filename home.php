<?php

include('connect.php');

session_start();

$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];

if (!isset($customer_id)) {
	header('location:login.php');
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
			<li><a href="home.php" class="active">Home</a></li>
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


	<div class="slider">
		<div class="sliderItem">
			<img src="./images/bosch_home.jpeg" alt="" class="sliderImg">
		</div>
	</div>

	<div class="intro">
		<div class="introTitle">
			<h3 class="introHeading">welcome <span><?php echo $customer_name; ?></span> to northcliff auto</h3>
			<h1 class="introSubHeading">Get a quote or book a service. We are a proud member of Bosch Car Service.</h1>
			<p class="introPara">You’re in good hands when it comes to vehicle services, maintenance, repairs and advice. Our experienced team of motor enthusiasts are fully equipped with the latest automotive technology to efficiently deal with all vehicle makes and models to get them back on the road as soon as possible.
				At Northcliff Auto, your driving safety is our top priority that's why with every service we will check your battery, tyres, engine, brakes, lights, windscreen wipers, oil, fluids, exhaust and air conditioning.</p>
		</div>
	</div>

	<div class="services">
		<div class="serviceSection">
			<div class="serviceCard">
				<img src="./images/servicing_car.avif" alt="engine" class="serviceImg">
				<h3 class="serviceType">servicing</h3>
				<p class="serviceLearn"><a href="#">learn more</a></p>
			</div>
			<div class="serviceCard">
				<img src="./images/bosch_working_2.jpeg" alt="brakes" class="serviceImg">
				<h3 class="serviceType">brakes</h3>
				<p class="serviceLearn"><a href="#">learn more</a></p>
			</div>
			<div class="serviceCard">
				<img src="./images/oil_pour.jpg" alt="oil pour" class="serviceImg">
				<h3 class="serviceType">oil change</h3>
				<p class="serviceLearn"><a href="#">learn more</a></p>
			</div>
			<div class="serviceCard">
				<img src="./images/bosch_products.jpeg" alt="products" class="serviceImg">
				<h3 class="serviceType">windscreen</h3>
				<p class="serviceLearn"><a href="#">learn more</a></p>
			</div>
		</div>
	</div>

	<div class="listSection">
		<div class="lists">
			<div class="list1">
				<div class="listBox">
					<div class="iconbox">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h2>Major Services</h2>
				</div>
				<div class="listBox">
					<div class="iconbox">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h2>Minor Services</h2>
				</div>
				<div class="listBox">
					<div class="iconbox">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h2>All Auto Elctrical Work</h2>
				</div>
				<div class="listBox">
					<div class="iconbox">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h2>Vehicle Diagonostics & Report</h2>
				</div>
			</div>
			<div class="list2">
				<div class="listBox">
					<div class="iconbox">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h2>Battery Replacement</h2>
				</div>
				<div class="listBox">
					<div class="iconbox">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h2>Brakes & Suspension</h2>
				</div>
				<div class="listBox">
					<div class="iconbox">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h2>Cambelt Servicing</h2>
				</div>
				<div class="listBox">
					<div class="iconbox">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h2>Wheel Balancing & Alignment</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="yearSection">
		<div class="yearText">
			<div class="text">
				<h3>20 years of experience</h3>
				<p>“Myself and my dedicated team are always ready to assist you with all your vehicle needs, there’s no job too big or small for us!” says operating partner Jacques Petzer, who has over 20 years worth of experience in vehicles and servicing in the area</p>
			</div>
			<div class="jacq">
				<img src="./images/workshop.jpeg" alt="partner">
			</div>
		</div>
	</div>

	<div class="choose">
		<h2>why choose us?</h2>
		<p>Northcliff Auto is a proud member of Bosch Car Service</p>
		<div class="chooseSection">
			<div class="item">
				<img src="./images/rmi_choose.png" alt="rmi approved">
			</div>
			<div class="item">
				<img src="./images/miwa_choose.png" alt="miwa approved">
			</div>
			<div class="item">
				<img src="./images/aa_icon_approved.png" alt="aa approved">
			</div>
		</div>
		<div class="chooseCertif">
			<div class="certif">
				<img src="./images/RMI approved.jpeg" alt="rmi certificate">
			</div>
			<div class="certif">
				<img src="./images/bosch_graded_work.jpeg" alt="miwa certificate">
			</div>
			<div class="certif">
				<img src="./images/AA_approved.jpeg" alt="aa certificate">
			</div>
		</div>
	</div>

	<div class="serviceBanner">
		<h2>is your car due for it's service</h2>
		<p>At Northcliff Auto we service all vehicle makes and models. Our team of dedicated mechanics constantly strive to ensure your vehicle is effectively serviced, repaired and maintained so that it’s driving at its best. Our state of the art diagnostic equipment is designed to diagnose a problem quickly and efficiently to avoid problems turning into major expenses.</p>
		<button type="submit" class="serviceBtn" id="quoteBtn" onclick="nextPage()">Get A Quote</button>
	</div>

	<!-- *********************************** Review Section **************************************** -->
	<div class="reviews">
		<h2>Reviews</h2>
		<div class="reviewItems">
			<div class="line"></div>
			<div class="review">
				<img src="./images/quote_image.png" alt="">
				<h3>The only place I would recommend taking your vehicle.Fantastic and professional service.</h3>
				<h6>- Callen Valkenburg</h6>
			</div>
			<div class="line"></div>
			<div class="review">
				<img src="./images/quote_image.png" alt="">
				<h3>Very professional. It’s the only place I trust to take my car for any kind of repair or check.</h3>
				<h6>- Jessica Franklin</h6>
			</div>
			<div class="line"></div>
			<div class="review">
				<img src="./images/quote_image.png" alt="">
				<h3>The only place I would recommend taking your vehicle.Fantastic and professional service.</h3>
				<h6>- Annemarie Stierlin</h6>
			</div>
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

	<script src="javascript/app.js"></script>

</body>

</html>