<?php
    session_start(); 

   
?>
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
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Superfish -->
		<link rel="stylesheet" href="css/superfish.css">

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/coach.css">
		
	</head>

	<body>
		<div id="fh5co-wrapper">
			<div id="fh5co-page">
				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="images/basketball-coach.webp" class="d-block w-100" alt="sport-facilities-1" style="height: 800px;" >
						</div>
						<div class="carousel-item">
							<img src="images/badminton-coach.jpg" class="d-block w-100" alt="sport-facilities-2" style="height: 800px;">
						</div>
						<div class="carousel-item">
							<img src="images/futsal-coach.jpg" class="d-block w-100" alt="sport-facilities-3" style="height: 800px;">
						</div>
					</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
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
										<span><a class="Reserve-Button" href="#">Find Out More</a></span>
											
										
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
										<span><a class="Reserve-Button" href="#">Find Out More</a></span>
											
										
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
										<span><a class="Reserve-Button" href="#">Find Out More</a></span>
											
										
									</div>
								</div>
							</div>
						</div>
						
					
							
					</div>
				</div>
				
			</div>
		
			<div id="showcoachavailable" class="fh5co-section">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="heading-section text-center animate-box">
								<h2>Here Is Our Available Coach</h2>
								<p>Coaches Have Provided to reserve for a classes Training</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			

			<?php

				$dbc = mysqli_connect("localhost", "root", "");
				mysqli_select_db($dbc, "sport");

				$query1 = mysqli_query($dbc, "SELECT * FROM coach");
				echo "<div class=\"listing-section\">";

				while ($row1 = $query1->fetch_assoc()) {
					$coachid= $row1['id'];
					$coachname = strtoupper($row1['CoachName']);
					$coachcontact = $row1['Contact'];
					$timeslot = $row1['TimeSlot'];
					$price = $row1['TrainingPrice'];
					$skill = $row1['StatusSkill'];
					$category = $row1['TypeSport'];
					$maximumpeople = $row1['capacity'];

					echo '<div class="col-md-3 mb-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-name">' . $coachname . '</h5>
									<h5 class="card-contact">Contact: ' . $coachcontact . '</h5>
									<h5 class="card-slot">Available Time: ' . $timeslot . '</h5>
									<h5 class="card-skill">Level: ' . $skill . '</h5>
									<h5 class="card-category">Sport: ' . $category . '</h5>
									<p class="card-price">RM' . $price . '/hour</p>
									<p class="card-cap">';

									if ($maximumpeople > 0) {
										echo 'Left ' . $maximumpeople . ' Slot';
										echo '</p><a class="btn btn-primary" href="test.php?id='. $coachid .'">Join Now</a>';
									} else {
										echo 'Full House';
									}
								
									echo '      </p>
											</div>
										</div>
									</div>';
				}

				if (mysqli_num_rows($query1) == 0) {
					echo '<p style="color:red;margin-left:800px;margin-top:200px">No Coach Available</p>';
				}
				echo "</div>";

			?>

			</div>
		</div>
	</body>
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

	


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>

	<script src="js/main.js"></script>


</html>

