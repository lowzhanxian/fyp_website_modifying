
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CH SC | HOME</title>
		<link rel="icon" type="image/x-icon" href="images/title.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
		<?php include 'header.php';?>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/icomoon.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/superfish.css">

		<link rel="stylesheet" href="css/style.css">
	
	</head>

	<body>
		<div id="fh5co-wrapper">
			<div id="fh5co-page">
				<div class="fh5co-hero">
					<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/mainPageimage1.jpg);background-repeat: repeat;background-size: cover;">
						<div class="desc animate-box">
							<div class="container">
								<div class="row">
									<div class="col-md-push-12 text-center"> 
										<h2>Keep fit &amp; Stay Healthy <br><b>is a Personal Property</b></h2>
										<p><span>Sport Court<i class="icon-arrow-down"></i>Find Now</span></p>
										<?php if(isset($_SESSION['username'])): ?>
											<span><a class="Click-Button" href="FacilitiesBook.php">RESERVE NOW<i class="icon-arrow-right"></i></a></span>
										<?php else: ?>
											<span><a class="Click-Button" href="login.php">RESERVE NOW<i class="icon-arrow-right"></i></a></span>
										<?php endif; ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


		
		

		<div id="fh5co-team-section" class="fh5co-lightgray-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="heading-section text-center animate-box">
							<h2>Our Coaches Training</h2>
							<p>Coaches Have Provided to reserve for a classes Training</p>
						</div>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/coach-training-homepage.jpg);">
							<div class="overlay-section">
								<div class="desc">
									<h3>Badminton Coach</h3>
									<span>Learn Some Skill Now</span>
									<span><a class="Reserve-Button" href="<?php echo isset($_SESSION['username']) ? 'FacilitiesBook.php' : 'login.php'; ?>">Find Out More</a></span>
										
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/coach-basketball.jpg);">
							<div class="overlay-section">
								<div class="desc">
									<h3>Basketball Coach</h3>
									<span>Learn Some Skill Now</span>
									<span><a class="Reserve-Button" href="<?php echo isset($_SESSION['username']) ? 'FacilitiesBook.php' : 'login.php'; ?>">Find Out More</a></span>
										
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-section-grid animate-box" style="background-image: url(images/coach-futsal.jpeg);">
							<div class="overlay-section">
								<div class="desc">
									<h3>Futsal Couch</h3>
									<span>Learn Some Skill Now</span>
									<span><a class="Reserve-Button" href="<?php echo isset($_SESSION['username']) ? 'FacilitiesBook.php' : 'login.php'; ?>">Find Out More</a></span>
										
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-parallax" style="background-image: url(images/home-image-2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="fh5co-intro fh5co-table-cell box-area">
							<div class="animate-box">
								<h1>We have provide sport equipment for you</h1>
								<p>You have no worried on forget to bring your sport equipment</p>
								<a href="<?php echo isset($_SESSION['username']) ? 'sportEquipment.php' : 'login.php'; ?>" class="btn btn-warning">See more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-8">
							<h3 class="section-title">About Us</h3>
							<p style="text-align: left;">we are from CH SPORT COMPLEC CENTRE that established online website for the penang user that more convenient to make reservetion on sport facilities , find coach , reserve equipment and other.s</p>
						</div>

						<div class="col-md-6 col-sm-8">
							<h3 class="section-title">Our Address</h3>
							<ul class="contact-info">
								<li ><i class="icon-map-marker"></i>11, CH Sport Complex,11900,Bayan Lepas,Pulau Pinang</li>
								<li><i class="icon-phone"></i>0127229218</li>
								<li><i class="icon-envelope"></i><a href="#">lowzhanxian9218@gmail.com</a></li>
								
							</ul>
						</div>
						
					</div>
					<div class="row copy-right">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							
						</div>
					</div>
				</div>
			</div>
		</footer>
	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>

