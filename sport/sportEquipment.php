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
		<?php include 'header.php'?>
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
		<link rel="stylesheet" href="css/sportEquipment.css">
		
	</head>

	<body>
		<div id="fh5co-wrapper">
			<div id="fh5co-page">
				<div class="fh5co-hero">
					<div class="fh5co-cover"  style="background-image: url(images/sport_equipment_page.png);">
						<div class="desc animate-box">
							<div class="container">
								<div class="row">
									<div class="col-md-push-12 text-center"> 
										<h2>We Provide Sport Equipment Rental Service</b></h2>
										<p>Sport Equipment Rental<span>Get Your Sport Equipment Now<i class="icon-arrow-down"></i></span></p>
										<span><a class="Click-Button" href="premiumMembers.php">Find Now</a></span>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<h1 class="title-sport-equipment">SPORT Equipment Rental</h1>
			<?php
				$dbc=mysqli_connect("localhost","root","");
				mysqli_select_db($dbc,"sport");
				
				$query1 = mysqli_query($dbc,"SELECT * FROM sportequipment");
			
				echo"<div class=\"listingproduct-section\">";
						while (($row1 = $query1->fetch_assoc()))
						{
							$product_ID= $row1['productId'];
							$product_Image = $row1['productImage'];
							$product_Name = $row1['productName'];
							$price = $row1['productPrice'];
							$stock=$row1['productStock'];
						
						
							echo'<div class="col-md-3 mb-3">
									<div class="card">
										<img src="images/' . $product_Image . '" class="card-img-top" alt="Product Image">
										<div class="card-body">
											<h5 class="card-name">' . $product_Name . '</h5>
											<p class="card-price">RM' . $price . '/hour</p>
											<p class="card-stock">';
												if ($stock > 0) {
													echo 'In Stock: ' . $stock;
												} else {
													echo 'Out of Stock';
												}
												
												echo'</p>
											<a class="btn btn-primary" href="confirmEquipment.php?productId=' . $product_ID . '" >Rent Now</a>
										</div>
									</div>
						  		</div>';
						}
							echo"</div>";





			?>
		
		
		
		
		
		
		
		
		
		
		
		
		
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
	

	
	


	<script src="js/jquery.min.js"></script>
	
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>

