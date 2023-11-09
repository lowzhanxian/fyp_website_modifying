
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CH SC | Sport Facilities</title>
		<link rel="icon" type="image/x-icon" href="images/title.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/date-picker.css" />
        <link rel="stylesheet" href="css/FacilitiesBook.css">
		<script src="js/date-picker.js"></script>
		<?php include 'header.php';?>


		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/icomoon.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/superfish.css">

		<link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="css/sportFacilitiesPage.css">
		<script src="js/modernizr-2.6.2.min.js"></script>
		
	
	</head>

	<body>
		<div id="fh5co-wrapper">
			<div id="fh5co-page">
			
				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
					<div class="carousel-item active">
						<div id="carouselh2" >
							<h2 id="carouselH2">Book &amp; Play</h2>
							
						</div>
						<img src="images/sport-facilities-court.jpg" class="d-block w-100" alt="sport-facilities-1" style="height: 600px;" >
					</div>
					<div class="carousel-item">
						<div id="carouselh2" >
							<h2 id="carouselH2">Book &amp; Play</h2>
								
						</div>
						<img src="images/sport-facilities-court2.jpg" class="d-block w-100" alt="sport-facilities-2" style="height: 600px;">
					</div>
					<div class="carousel-item">
						<div id="carouselh2" >
							<h2 id="carouselH2">Book &amp; Play</h2>
							
						</div>
						<img src="images/sport-facilities-court3.png" class="d-block w-100" alt="sport-facilities-3" style="height: 600px;">
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
                <?php
                    $dbc=mysqli_connect("localhost","root","");
                    mysqli_select_db($dbc,"sport");

                    $query = mysqli_query($dbc,"SELECT *  FROM  maintainance WHERE maintenance_end_Date > NOW()");
                   
                            
                    echo"<div class=\"listingproduct-section\">";
                        while (($row1 = $query->fetch_assoc()))
                            {
                                $courtType= $row1['courtType'];
                                $courtNumber= $row1['courtNumber'];
                                $startDate = $row1['maintenance_date'];
                                $endDate = $row1['maintenance_end_Date'];
                                $message = $row1['message'];
                                $postedDate = $row1['posted_date'];

                                

                            
                                echo'<div class="card">
                                        
                                            <div class="card-content">
                                                <div class="container text-center">
                                                    <h1 ><span id="maintainanceTitle">Announcement!!</span></h1>
                                                    <div class="row">
                                                        <span id="message_Maintainance">'.$message.'</span>
                                                    </div>
                                                    <div class="row">
                                                        <small id="postDate">Post On:'.$postedDate.'</small>  
                                                    </div>
                                                    <div class="row">
                                                        <button id="moreDetailsButton" onclick="dialogDetails()">More Details</button>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="opendiv"  class="success">
                                                <div class="content">
                                                    <span class="close-button" onclick="closeModal()">×</span>
                                                    <h1 ><span id="maintainanceTitle">Announcement!!</span></h1>
													<div class="row">
														<div class="col text-center">
															<span id="message_Maintainance">'.$courtType.' '.$courtNumber.'</span>
														</div>
													
													<div class="row"><div class="col text-center"><span id="message">Message:'.$message.'</span></div></div>
													<div class="row"><div class="col text-center"> <span id="message_Maintainance">'.$startDate.'</span></div></div>
													<div class="row"><div class="col text-center"><span id="message_Maintainance">'.$endDate.'</span></div></div>
														

													
													</div>
							
                                                    
                                                    
                                                    
                                                   
                                                    

                                                </div>
                                            </div>
                                            <script>
                                                var openDiv = document.getElementById("opendiv");

                                                function dialogDetails() {
                                                    openDiv.style.display = "block";
                                                }
                                            
                                                function closeModal() {
                                                    openDiv.style.display = "none";
                                                }
                                            </script>
                                         
                                    
                                    </div>';
                            }
                            echo"</div>";





                ?>

				<div id="fh5co-sport-section" class="fh5co-lightgray-section">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="heading-section text-center animate-box">
									<h2>Sport Facilties</h2>
									<p>Types of Sport Facilities have provided to come & reserve to play with your family , friend and love .</p>
								</div>
							</div>
						</div>
						<?php
							$dbc = mysqli_connect("localhost", "root", "");
							mysqli_select_db($dbc, "sport");

							$query2 = mysqli_query($dbc, "SELECT DISTINCT courtType FROM facilities");

	
							// Loop through the retrieved court types and create options
							while ($row = $query2->fetch_assoc()) {
								$courtType = $row['courtType'];
								echo '
								<div class="col-md-4 mb-3">
									<div class="col">
										<div class="card-body">
											<h3>' . $courtType . '</h3>
											<span id="smallTi">Find Your Facilities</span><br><br>
											<span><a class="Reserve-Button" href="FacilitiesBook2.php?courtType=' . $courtType . '">Book Now</a></span>
										</div>
									</div>
								</div>';
							}

							echo '</div>';
							mysqli_close($dbc);
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
	

	</div>

	</div>



	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>

