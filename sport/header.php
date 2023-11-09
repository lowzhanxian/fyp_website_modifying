<?php if(session_status() == PHP_SESSION_NONE){
    session_start();
} ?>

<!--header -->
<div id="fh5co-header">
					<header id="fh5co-header-section">
							<div class="container">
								<div class="nav-header">
									
									<h1 id="fh5co-logo"><a href="homepage.php">CH SC</a></h1>
									
									<!--start the navigation bar-->
									<nav id="fh5co-menu-wrap" role="navigation">
										<ul class="sf-menu" id="fh5co-primary-menu">
											<li class="active">
												
												<a href="homepage.php">Home</a>
											</li>
											<?php if(isset($_SESSION['username'])): ?>
												<li><a href="FacilitiesBook.php"> Facilities</a></li>
												<li>
														<ul class="fh5co-sub-menu">
														<li><a href="sportFacilities.php">Badminton Court</a></li>
														<li><a href="sportFacilities.php">Basketball Court</a></li>
														<li><a href="sportFacilities.php">Futsal Court</a></li>
													</ul>
												</li>
												<li><a href="coach.php">Athelic Coaching</a></li>
												<li><a href="sportEquipment.php">Equipment Rental</a></li>
												<li><a href="profile.php">Profile</a></li>
											<?php else: ?>
												<li><a href="login.php">Login</a></li>
											<?php endif; ?>
										<li><a href="about.php">About</a></li>
										
									</ul>
								</nav>
							</div>
						</div>
					</header>		
			</div>
		<!--header -->