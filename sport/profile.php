<?php session_start();
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
	<link rel="stylesheet" href="css/profile.css">
	<link rel="stylesheet" href="css/profile2.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- switch JS -->
</head>

<body>
	<div id="fh5co-wrapper">
		<div id="fh5co-page">
		
		<div class="fh5co-parallax" style="background-image: url(images/about-us-1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell animate-box">
							<h1 class="text-center">Your Profile</h1>
							<p></p>
							<span><a class="About-Us-Button" href="#nav_bar">See Now</a></span>
							<span><a class="About-Us-Button" href="logout.php">Log Out</a></span>

						</div>
					</div>
				</div>
			</div>
		</div><!-- end: fh5co-parallax -->
		<?php
			

			$dbc = mysqli_connect("localhost", "root", "", "sport");

			if (!$dbc) {
				die("Connection failed: " . mysqli_connect_error());
			}

			if (isset($_SESSION['email'])) {
				$email = $_SESSION['email'];

				$stmt = $dbc->prepare("SELECT username, email, contactNumber FROM user WHERE email = ?");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) {
					$user = $result->fetch_assoc();

					echo '<div class="col" id="profilepic">
							<div class="card mb-3">
								<div class="card-body">
									<div class="row">
										<div class="col text-center">
											<h6 class="mb-0">User Name:</h6><br>
											<h6>' . $user['username'] . '</h6>
										</div>
										<div class="col text-center">
											<h6 class="mb-0">Email:</h6><br>
											<h6>' . $user['email'] . '</h6>
										</div>
										<div class="col text-center">
											<h6 class="mb-0">Contact Number:</h6><br>
											<h6>' . $user['contactNumber'] . '</h6>
										</div>
									</div>
								</div>
							</div>
						</div>';

					echo '<form action="" method="post">
							<div class="edit-namecard-body" id="NameCard">
								<div class="row">
									<div class="col text-center">
										<label for="username" class="form-label">Edit Name</label><br>
										<input type="text" class="form-control" id="username" name="username" value="' . $user['username'] . '" min-length="4">
										<span id="fornamemsg" style="color:red;"></span>
									</div>
								</div>
								<div class="row">
									<div class="col text-center">
										<button type="submit" class="btn btn-info" name="updateName">Update</button>
									</div>
								</div>
							</div>
						</form>';

					echo '<form action="" method="post">
							<div class="edit-emailcard-body" id="EmailCard">
								<div class="row">
									<div class="col text-center">
										<label for="email" class="form-label">Edit Email</label><br>
										<input type="text" class="form-control" id="email" name="email" value="' . $user['email'] . '">
										<span id="foremailmsg" style="color:red;"></span>
									</div>
								</div>
								<div class="row">
									<div class="col text-center">
										<button type="submit" class="btn btn-info" name="updateEmail">Update</button>
									</div>
								</div>
							</div>
						</form>';

					echo '<form action="" method="post">
							<div class="edit-phonecard-body" id="PhoneCard">
								<div class="row">
									<div class="col text-center">
										<label for="phone" class="form-label">Edit Contact</label><br>
										<input type="text" class="form-control" id="phone" name="phone" value="' . $user['contactNumber'] . '" 
										minlength="10"
										maxlength="11">
										<span id="forphonemsg" style="color:red;"></span>
									</div>
								</div>
								<div class="row">
									<div class="col text-center">
										<button type="submit" class="btn btn-info" name="updatePhone">Update</button>
									</div>
								</div>
							</div>
						</form>';
				}
			}

			//update email
			if (isset($_SESSION['email'])) {
				$email = $_SESSION['email'];
			
				$stmt1 = $dbc->prepare("SELECT * FROM sportfacilitiesreservation WHERE useremail = ?");
				$stmt1->bind_param("s", $email);
				$stmt1->execute();
				$bookings = $stmt1->get_result();
			
				$stmt2 = $dbc->prepare("SELECT * FROM reservecoach WHERE emailUser = ?");
				$stmt2->bind_param("s", $email);
				$stmt2->execute();
				$coachClass = $stmt2->get_result();

				$stmt3 = $dbc->prepare("SELECT * FROM equipmentrental WHERE userEmail = ? AND status = 'rented'");
				$stmt3->bind_param("s", $email);
				$stmt3->execute();
				$rentalEquipment = $stmt3->get_result();
				
				$currentDate = date('Y-m-d');
				
				$stmt4 = $dbc->prepare("SELECT * FROM equipmentrental");
			
				$stmt4->execute();
				$result = $stmt4->get_result();
				

			}
			
			echo '<div class="container-profile">';
			echo '<ul class="nav nav-tabs">';
			echo '<li class="nav-item">';
			echo '<a class="nav-link " href="#bookedCourt" data-toggle="tab">Booked Court</a>';
			echo '</li>';
			echo '<li class="nav-item">';
			echo '<a class="nav-link" href="#coachClass" data-toggle="tab">Coach Class</a>';
			echo '</li>';
			echo '<li class="nav-item">';
			echo '<a class="nav-link" href="#rentEquipment" data-toggle="tab">Rent Equipment</a>';
			echo '</li>';
			echo '</ul>';
			
			echo '<div class="tab-content mt-3">';
			echo '<div class="tab-pane active" id="bookedCourt">';
			
			


			$time = new DateTimeZone('Asia/Singapore'); 
			$currentDateTime = new DateTime('now', $time);
			

			$comingsoonBook = [];
			$expiredBookings = [];

			while ($booking = $bookings->fetch_assoc()) {
				$times = explode(' - ', $booking['timeslot']);
				$bookingDateTime = new DateTime($booking['date'] . ' ' . $times[0]);

				if ($bookingDateTime > $currentDateTime) {
					$comingsoonBook[] = $booking;
				} else {
					$expiredBookings[] = $booking;
				}
			}
			//viewBooking
			echo '<h3>Upcoming Bookings</h3>';
			if (!empty($comingsoonBook)) {
				echo '<table class="table table-bordered">';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Court Name</th>';
				echo '<th>Date</th>';
				echo '<th>Time</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				foreach ($comingsoonBook as $booking) {
					echo '<tr>';
					echo '<td>' . htmlspecialchars($booking['facilitytypecourtNumber']) . '</td>'; 
					echo '<td>' . htmlspecialchars($booking['date']) . '</td>';       
					echo '<td>' . htmlspecialchars($booking['timeslot']) . '</td>';      
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
			} else {
				echo '<p id="p_book">You have no upcoming bookings.</p>';
			}

			echo '<h3>Expired Bookings</h3>';
			if (!empty($expiredBookings)) {
				echo '<table class="table table-bordered">';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Court Name</th>';
				echo '<th>Date</th>';
				echo '<th>Time</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				foreach ($expiredBookings as $booking) {
					echo '<tr>';
					echo '<td>' . htmlspecialchars($booking['facilitytypecourtNumber']) . '</td>'; 
					echo '<td>' . htmlspecialchars($booking['date']) . '</td>';       
					echo '<td>' . htmlspecialchars($booking['timeslot']) . '</td>';      
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
			} else {
				echo '<p id="p_book">You have no expired bookings.</p>';
			}
			echo '</div>';
			echo '<div class="tab-pane" id="coachClass">';

			//viewCoachClass
			if (isset($coachClass) && $coachClass->num_rows > 0) {
				echo '<table class="table table-bordered">';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Coach Name</th>';
				echo '<th>Coach Contact</th>';
				echo '<th>Class Time</th>';
				echo '<th>Price</th>';
				echo '<th>Skill</th>';
				echo '<th>Sport Category</th>';
				echo '<th>Manage</th>';

				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				while ($coach  = $coachClass->fetch_assoc()) {
					echo '<tr>';
					echo '<td>' . htmlspecialchars($coach['nameCoach']) . '</td>'; 
					echo '<td>' . htmlspecialchars($coach['coachContact']) . '</td>'; 
					echo '<td>' . htmlspecialchars($coach['timeavailability']) . '</td>'; 
					echo '<td>' . htmlspecialchars($coach['priceCoach']) . '</td>';       
					echo '<td>' . htmlspecialchars($coach['skillLevelCoach']) . '</td>';      
					echo '<td>' . htmlspecialchars($coach['sportCategoryCoach']) . '</td>';      
					echo '<td>';
					//able to cancel class
					echo '<form action="" method="post">'; // Point to the PHP script handling deletion
					echo '<input type="hidden" name="ReservecoachId" value="' . $coach['reservecoachId'] . '">'; // Assuming classID is the unique identifier
					
					echo '<button type="submit" name="cancel" class="btn btn-danger">Cancel Class</button>';
					echo '</form>';
					
					echo '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
			} else {
				echo '<p id="p_book">No Coach Class</p>';
			}
			echo '</div>';
			
			echo '<div class="tab-pane" id="rentEquipment">';
			if (isset($rentalEquipment) && $rentalEquipment->num_rows > 0) {
				echo '<table class="table table-bordered">';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Product Image</th>';
				echo '<th>Product Name</th>';
				echo '<th>Product Price</th>';
				echo '<th>Rent Date</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				while ($equipmentRent = $rentalEquipment->fetch_assoc()) {
					echo '<tr>';
					
					// Assuming $equipmentRent['productImage'] contains the path to the image
					$productImage = filter_var($equipmentRent['productImage'], FILTER_SANITIZE_URL);

					// Check if the image path is not empty and is a valid URL
					// Check if the image path is not empty and exists on the server
					if (!empty($productImage) && file_exists('images/' . $productImage)) {
						echo '<td><img src="images/' . htmlspecialchars($productImage) . '" alt="Product Image" style="width:100px; height:auto;"></td>';
					} else {
						echo '<td>Error with image: images/' . htmlspecialchars($productImage) . '</td>'; // This is the debugging line
					}



					echo '<td>' . htmlspecialchars($equipmentRent['productName']) . '</td>'; 
					echo '<td>' . htmlspecialchars($equipmentRent['productPrice']) . '</td>'; 
					echo '<td>' . htmlspecialchars($equipmentRent['rentDate']) . '</td>'; 

					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
			} else {
				echo '<p id="p_book">No Rental Equipment found.</p>';
			}


			
			echo '</div>';
			echo '</div>';
			echo '</div>'; 
			echo '</div>'; 




		
			if (isset($_POST['updateName'])) {
				$newUsername = $_POST['username'];
				
				// Validate username length
				if (strlen($newUsername) < 3) {
					echo '<script>alert("Username length must be at least 3 characters.");</script>';
					exit;
				}
			
				// Check if username exists (excluding the current user)
				$stmt = $dbc->prepare("SELECT username FROM user WHERE username = ? AND email != ?");
				$stmt->bind_param("ss", $newUsername, $email);
				$stmt->execute();
				$result = $stmt->get_result();
				if ($result->num_rows > 0) {
					echo '<script>alert("Username already exists.");</script>';
					exit;
				}
			
				// Update username in user table
				$stmt = $dbc->prepare("UPDATE user SET username = ? WHERE email = ?");
				$stmt->bind_param("ss", $newUsername, $email);
				$stmt->execute();
			
				// Update other tables
				$stmt = $dbc->prepare("UPDATE equipmentrental SET userName = ? WHERE userEmail = ?");
				$stmt->bind_param("ss", $newUsername, $email);
				$stmt->execute();
			
				$stmt = $dbc->prepare("UPDATE reservecoach SET nameUser = ? WHERE emailUser = ?");
				$stmt->bind_param("ss", $newUsername, $email);
				$stmt->execute();
			
				$stmt = $dbc->prepare("UPDATE sportfacilitiesreservation SET username = ? WHERE useremail = ?");
				$stmt->bind_param("ss", $newUsername, $email);
				$stmt->execute();
			
				echo '<script>alert("Username updated successfully.");</script>';
				$_SESSION['username'] = $newUsername; 
			}
			
			if (isset($_POST['updateEmail'])) {
				$newEmail = $_POST['email'];
				
				// Validate email format (optional, but useful)
				if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
					echo '<script>alert("Invalid email format.");</script>';
					exit;
				}
			
				// Check if email exists (excluding the current user)
				$stmt = $dbc->prepare("SELECT email FROM user WHERE email = ? AND email != ?");
				$stmt->bind_param("ss", $newEmail, $email);
				$stmt->execute();
				$result = $stmt->get_result();
				if ($result->num_rows > 0) {
					echo '<script>alert("Email already exists.");</script>';
					
					exit;
				}
			
				// Update email in user table
				$stmt = $dbc->prepare("UPDATE user SET email = ? WHERE email = ?");
				$stmt->bind_param("ss", $newEmail, $email);
				$stmt->execute();
			
				// Update other tables
				$stmt = $dbc->prepare("UPDATE equipmentrental SET userEmail = ? WHERE userEmail = ?");
				$stmt->bind_param("ss", $newEmail, $email);
				$stmt->execute();
			
				$stmt = $dbc->prepare("UPDATE reservecoach SET emailUser = ? WHERE emailUser = ?");
				$stmt->bind_param("ss", $newEmail, $email);
				$stmt->execute();
			
				$stmt = $dbc->prepare("UPDATE sportfacilitiesreservation SET useremail = ? WHERE useremail = ?");
				$stmt->bind_param("ss", $newEmail, $email);
				$stmt->execute();
			
				echo '<script>alert("Email updated successfully.");</script>';
				$_SESSION['email'] = $newEmail; // Add this line

			}
			
			if (isset($_POST['updatePhone'])) {
				$newContact = $_POST['phone'];
			
				// You can add other validations for the contact number if needed
			
				// Update contact number in user table
				$stmt = $dbc->prepare("UPDATE user SET contactNumber = ? WHERE email = ?");
				$stmt->bind_param("ss", $newContact, $email);
				$stmt->execute();
			
				// Update sportfacilitiesreservation table
				$stmt = $dbc->prepare("UPDATE sportfacilitiesreservation SET contactnumber = ? WHERE useremail = ?");
				$stmt->bind_param("ss", $newContact, $email);
				$stmt->execute();
			
				if ($stmt->execute()) {
					echo '<script>alert("Contact number updated successfully.");</script>';
					$_SESSION['contactNumber'] = $newContact;
				} else {
					echo '<script>alert("Failed to update contact number.");</script>';
				}
			}
			if(isset($_POST['cancel'])) {
				$reservecoachId = $_POST['ReservecoachId'];
				
				// Fetch coachId for the reservation before deleting
				$fetch_stmt = $dbc->prepare("SELECT coachId FROM reservecoach WHERE reservecoachId = ?");
				$fetch_stmt->bind_param("i", $reservecoachId);
				$fetch_stmt->execute();
				$result = $fetch_stmt->get_result();
				
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$coachId = $row['coachId'];
					
					// Delete the record from the reservecoach table
					$delete_stmt = $dbc->prepare("DELETE FROM reservecoach WHERE reservecoachId = ?");
					$delete_stmt->bind_param("i", $reservecoachId);
					$delete_stmt->execute();
					
					if($delete_stmt->affected_rows > 0 && $delete_stmt->errno == 0) {
						// Update the capacity in the coach table
						$update_stmt = $dbc->prepare("UPDATE coach SET capacity = capacity + 1 WHERE id = ?");
						$update_stmt->bind_param("i", $coachId);
						$update_stmt->execute();
						
						if($update_stmt->affected_rows > 0 && $update_stmt->errno == 0) {
							echo '<script>alert("Class cancelled !");</script>';
						} else {
							echo '<script>alert("Class cancelled but failed to update capacity.");</script>';
						}
					} else {
						echo '<script>alert("Failed to cancel class.");</script>';
					}
				}
			}
			
			
			
			
			
			
		
			
		?>

		<script>
			document.getElementById('username').addEventListener('input', nameInputPrevent);
			document.getElementById('phone').addEventListener('input', phonenumber);
			var errorMsg = document.getElementById('fornamemsg');

			function nameInputPrevent() {
				var nameInput = document.getElementById('username');
				nameInput.value = nameInput.value.replace(/[0-9]/g, ''); 
				if (this.value.length < 4) {
					errorMsg.textContent = 'Username should be more than 3 characters.';
				} else {
					errorMsg.textContent = 'Valid Name';
				}
			}
			var phoneMsg = document.getElementById('forphonemsg');
			function phonenumber() {
				var phoneInput = document.getElementById('phone');
				phoneInput.value = phoneInput.value.replace(/[^0-9]/g, ''); 
				if (this.value.startsWith('01') && (this.value.length === 10 || this.value.length ===12 )) {
					phoneMsg.textContent = 'Valid Number';
					
				} else {
					phoneMsg.textContent = 'Invalid (Must Start with 01 /Length among 10 -11)';
				}
			}
			document.getElementById('email').addEventListener('input', checkEmail);
			var emailMSG = document.getElementById('foremailmsg');
			function checkEmail() {
				var emailformat = /@[a-zA-Z0-9-]+\.com$/;

				if (emailformat.test(emailValue)) {
					emailMSG.textContent = 'Valid Email'; 
				} else {
					emailMSG.textContent = 'Email must contain "@" followed by some text and end with ".com"';
				}
		}
		

		</script>
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

