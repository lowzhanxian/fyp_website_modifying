
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
		<script src="js/date-picker.js"></script>
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

		<link rel="stylesheet" href="css/sportFacilitiesPage.css">
		<!-- js -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<script src="js/sportFac.js"></script>
	
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
						<div class="sport-Select">
							<label for="sportoption" id="labelSport">Looking For</label>
							<select id="sportoption" name="sport"  onchange="opentheDiv()">
								<option disabled selected  >Find</option>
								<option  value="badminton">Badminton Court</option>
								<option value="basketball">Basketball Court</option>
								<option value="futsal">Futsal Court</option>
							</select>
						</div>
						

					</div>
				</div>

		<!-- END sportfacilities-content -->

		<div id="badmintonFac" style="display: none;" >
			<div class="row">
				
				<div class="col" id="badmintonCourt">
						<div><a href="#forminput" class="court-number" data-court="1">Court 1</a></div>
						<script>
					
							var courtNumbers = document.querySelectorAll('.court-number');

			
								courtNumbers.forEach(function (link) {
								link.addEventListener('click', function (event) {
								

								// Get the court number from the data attribute
								var courtNumber = link.getAttribute('data-court');

								// Update the input field with the selected court number
								document.getElementById('courtNumber').value = 'Badminton Court ' + courtNumber;
								var forminput = document.getElementById('forminput');
								forminput.scrollIntoView({ behavior: 'smooth' });
							});
						});
					</script>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
				</div>
					<div class="col" id="badmintonCourt2" >
						<div><a href="#forminput" class="court-number" data-court="2">Court 2</a></div>
						<script>
				
								var courtNumbers = document.querySelectorAll('.court-number');

				
									courtNumbers.forEach(function (link) {
									link.addEventListener('click', function (event) {
									event.preventDefault(); // Prevent the default link behavior

									// Get the court number from the data attribute
									var courtNumber = link.getAttribute('data-court');

									// Update the input field with the selected court number
									document.getElementById('courtNumber').value = ' Badminton Court ' + courtNumber;
									var forminput = document.getElementById('forminput');
									forminput.scrollIntoView({ behavior: 'smooth' });
								});
							});
						</script>
							<div></div>
							<div></div> 
							<div></div> 
							<div></div> 
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
   			 		</div>
		</div>
			<div class="row">
				<div class="col" id="badmintonCourt" >
				<div class="CourtNum"><a href="#forminput" class="court-number" data-court="3">Court 3</a></div>
					<script>
    		
							var courtNumbers = document.querySelectorAll('.court-number');

			
								courtNumbers.forEach(function (link) {
								link.addEventListener('click', function (event) {
								event.preventDefault(); // Prevent the default link behavior

								// Get the court number from the data attribute
								var courtNumber = link.getAttribute('data-court');

								// Update the input field with the selected court number
								document.getElementById('courtNumber').value = 'Badminton Court ' + courtNumber;
								var forminput = document.getElementById('forminput');
								forminput.scrollIntoView({ behavior: 'smooth' });
							});
						});
					</script>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
   			 	</div>
					<div class="col" id="badmintonCourt" >
					<div><a href="#forminput" class="court-number" data-court="4">Court 4</a></div>
					<script>
    		
							var courtNumbers = document.querySelectorAll('.court-number');

			
								courtNumbers.forEach(function (link) {
								link.addEventListener('click', function (event) {
								event.preventDefault(); // Prevent the default link behavior

								// Get the court number from the data attribute
								var courtNumber = link.getAttribute('data-court');

								// Update the input field with the selected court number
								document.getElementById('courtNumber').value = ' Badminton Court ' + courtNumber;
								var forminput = document.getElementById('forminput');
								forminput.scrollIntoView({ behavior: 'smooth' });
							});
						});
					</script>
						<div></div>
						<div></div> 
						<div></div> 
						<div></div> 
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
   			 	</div>
			</div>
			<div class="row">
				<div class="col" id="badmintonCourt" >
				<div><a href="#forminput" class="court-number" data-court="5">Court 5</a></div>
					<script>
    		
							var courtNumbers = document.querySelectorAll('.court-number');

			
								courtNumbers.forEach(function (link) {
								link.addEventListener('click', function (event) {
								event.preventDefault(); // Prevent the default link behavior

								// Get the court number from the data attribute
								var courtNumber = link.getAttribute('data-court');

								// Update the input field with the selected court number
								document.getElementById('courtNumber').value = ' Badminton Court ' + courtNumber;
								var forminput = document.getElementById('forminput');
								forminput.scrollIntoView({ behavior: 'smooth' });
							});
						});
					</script>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
   			 	</div>
					
			</div>
			
			
		

			<form id="forminput" action="bookingDatabase.php" method="post">
				<h2 id="h2_sportFacilities">All Field is Required</h2>
				<div class="row">
					<div class="col"  >
						<label for="date">Select the date:</label>
						<input type="date" class="form-control" id="date-badminton" name="date"  required min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('+14 days')); ?>"?><br><br>
					</div>
					
					
				</div>
				
				<div class="col" id="time">
					<label for="timeSlot">Availability Time Slot</label>
					<div class="time-table" name="timeSlot" id="timeTableBadminton">
						
						<div class="time-slot" data-time="9:00 am-10:00 am">9:00 am-10:00 am</div>
						<div class="time-slot" data-time="10:00 am-11:00 am">10:00 am-11:00 am</div>
						<div class="time-slot" data-time="11:00 am - 12:00pm">11:00 am-12:00pm</div>
						<div class="time-slot" data-time="12:00 pm-1:00pm">12:00 pm-1:00pm</div>
						<div class="time-slot" data-time="1:00 pm-2:00pm">1:00 pm-2:00pm</div>
						<div class="time-slot" data-time="2:00 pm-3:00pm">2:00 pm-3:00pm</div>
						<div class="time-slot" data-time="3:00 pm-4:00pm">3:00 pm-4:00pm</div>
						<div class="time-slot" data-time="4:00 pm-5:00pm">4:00 pm-5:00pm</div>
						<div class="time-slot" data-time="5:00 pm-6:00pm">5:00 pm-6:00pm</div>
						<div class="time-slot"  data-time="6:00 pm-7:00pm">6:00 pm-7:00pm</div>
						<div class="time-slot" data-time="7:00 pm-8:00pm">7:00 pm-8:00pm</div>
						<div class="time-slot" data-time="8:00 pm-9:00pm">8:00 pm-9:00pm</div>
					</div>
					
					<script>
				// Function to handle time slots for Badminton
				function badmintonTimeSlot() {
					// Get the current date and time
					var live = new Date();
					var liveHour = live.getHours();
					var liveMinute = live.getMinutes();

					// Get the selected date from the input
					var selectedDateInput = document.getElementById('date-badminton');
					selectedDateInput.addEventListener('change', function () {
						var selectedDate = new Date(selectedDateInput.value);

						// Get all time slots for Badminton
						var timeSlots = document.querySelectorAll('.time-table#timeTableBadminton .time-slot');

						// Check if the selected date is today
						var isToday = selectedDate.toDateString() === live.toDateString();

						// Loop through each time slot and disable/enable past time slots for Badminton
						timeSlots.forEach(function (timeSlot) {
							// Extract the start time from the data-time attribute
							var timeRange = timeSlot.getAttribute('data-time').split('-');
							var startTime = timeRange[0].trim();
							var beginHour = parseInt(startTime.split(':')[0]);
							var beginMinute = parseInt(startTime.split(':')[1]);

							// 12-hour to 24-hour format conversion
							if (startTime.includes('pm') && beginHour !== 12) {
								beginHour += 12;
							}

							// Check if the time slot is in the past for the selected date
							if (isToday && (beginHour < liveHour || (beginHour === liveHour && beginMinute <= liveMinute))) {
								// This time slot has already passed, so disable it
								timeSlot.classList.add('disabled');
							} else {
								// This time slot is in the future or for a different date, so enable it
								timeSlot.classList.remove('disabled');
							}
						});
					});
				}

				// Call the function to handle Badminton time slots
				badmintonTimeSlot();
			</script>






					<script>
						var timeselect = document.querySelectorAll('.time-slot');

						timeselect.forEach(function (slot) {
							slot.addEventListener('click', function () {
								var selectedTime = slot.getAttribute('data-time');
								var timeselect = document.getElementById('timeSlot');
								
								timeselect.value = selectedTime;
							});
						});

					</script>
					
				</div>
				<div class="row">
					<div class="col">
					<label for="courtNumber">Time Slot:</label>
						<input type="text" class="form-control" id="timeSlot" name="timeSlot" readonly>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label for="courtNumber">Badminton Court Number:</label>
						<input type="text" class="form-control" id="courtNumber" name="courtNumber" readonly>
					</div>
					
					<div class="col">
						<label for="inputemail" class="form-label">Your-Email:</label>
						<input type="email" class="form-control" id="inputemail" name="InputEmail"  placeholder="email@example.com">
						<script>
							
							var inputuserEmail = document.getElementById('inputemail');
							
							
							inputuserEmail.addEventListener('input', function () {
								
								var inputuserEmail = this.value;
							
								
								if (inputuserEmail.length < 0) {
								this.style.color = 'black';
								this.style.fontWeight='normal';
								} 
								else {
								this.style.color = '#31087B'; 
								this.style.fontWeight = "bold";
								}
							});
							</script>
					</div>
					
				</div>
				<div class="row">
					<div class="col">
					<label for="username" class="form-label">Full-Name:</label>
								<input type="text" class="form-control" id="username" name="Username" pattern="[A-Za-z\s]+" placeholder="Low Zhan Xian" required>
								<script>
									
									var inputFullName = document.getElementById('username');
								  
									
									inputFullName.addEventListener('input', function () {
									 
									  var inputFullName = this.value;
								  
									 
									  if (inputFullName.length < 0) {
										this.style.color = 'black';
										this.style.fontWeight='normal';
									  } 
									  else {
										this.style.color = '#31087B'; 
										this.style.fontWeight = "bold";
									  }
									});
								  </script>
							<script>
								var userNameInput=document.getElementById('username');


								//now we want to disable the user to type the numeric number 
								userNameInput.addEventListener('input',function()
								{
									this.value=this.value.replace(/[0-9]/g, '');
								});
							</script>
					</div>
					
				</div>
				<div class="row">
					<div class="col">
						<label for="contactnumber" class="form-label">Your-Phone:</label>
						<input type="text" class="form-control" id="contactnumber" name="contactNumber" maxlength="10" pattern="(01[0-9][0-9]{7}|03[0-9]{7,8})" placeholder="Enter Your Phone Number" required >
							<script>
									
								var contactnumber = document.getElementById('contactnumber');
								  
									
								contactnumber.addEventListener('input', function () {
									 
								var contactnumber = this.value;
								  
									 
									if (contactnumber.length < 0) {
										this.style.color = 'black';
										this.style.fontWeight='normal';
									  } 
									else {
										this.style.color = '#31087B'; 
										this.style.fontWeight = "bold";
									  }
									});
							</script>
								<script>
									var PhoneInput=document.getElementById('contactnumber');


									//now we want to disable the user to type the numeric number 
									PhoneInput.addEventListener('input',function()
									{
										this.value=this.value.replace(/\D/g, '');
										});
								</script>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="totalPrice"> Price For One Court:</label>
    					<input type="text" class="form-control" id="totalPrice" name="totalPrice" readonly>
					</div>
					<script>
						function countPriceCourt() {
							const timeSlotMenu = document.getElementById('timeSlot');
							const totalPrice = document.getElementById('totalPrice');
							
							
							const thePrice = 15; // Define the price per hour
							
							// Get the selected value from the time slot menu
							const timeSlotMenuSelected = parseInt(timeSlotMenu.value, 10);
							
							// Calculate the total price
							const priceCourt = thePrice ;
							
							// Set the total price in the input field
							totalPrice.value = priceCourt.toFixed(2);
						}
						
						
						
						// Initial calculation when the page loads
						countPriceCourt();
					</script>
				</div>
				<h4 id="h4_sportFacilities">Customer compulsory to enter the requirement details</h4>
				<h4 id="h4_sportFacilities">The price is fixed and user only can book for 1 hour in select form , if user want book more , after payment done can proceed with same way</h4>
				
					
				<button type="submit" name="book" class="btn btn-outline-info">Confirm To Payment</button>
			</form>
		</div>
		<div id="basketballDiv" style="display: none;">
			<div class="row court-row">
				<div class="col court-col">
					<a href="" class="basketball-court" data-court="1" id="court_One">Court 1</a>
				</div>
				<script>
					var basketballcourtNumbers = document.querySelectorAll('.basketball-court');

					basketballcourtNumbers.forEach(function (link) {
						link.addEventListener('click', function (event) {
							event.preventDefault(); // Prevent the default link behavior

							// Get the court number from the data attribute
							var courtNumber = link.getAttribute('data-court');

							// Update the input field with the selected court number
							document.getElementById('basketballcourtNumber').value = 'BasketBall Court ' + courtNumber;
							var forminput2 = document.getElementById('forminput2');
							forminput2.scrollIntoView({ behavior: 'smooth' });
						});
					});
				</script>
				<div class="col court-col">
					<img class="basketball-court-img" id="selectedIMG1" src="images/basketball.svg">
				</div>
			</div>
			<div class="row court-row">
				<div class="col court-col">
					<a href=""  class="basketball-court" data-court="2" id="court_One">Court 2</a>
				</div>
				<script>
					var basketballcourtNumbers = document.querySelectorAll('.basketball-court');

					basketballcourtNumbers.forEach(function (link) {
						link.addEventListener('click', function (event) {
							event.preventDefault(); // Prevent the default link behavior

							// Get the court number from the data attribute
							var courtNumber = link.getAttribute('data-court');

							// Update the input field with the selected court number
							document.getElementById('basketballcourtNumber').value = 'BasketBall Court ' + courtNumber;
							var forminput2 = document.getElementById('forminput2');
							forminput2.scrollIntoView({ behavior: 'smooth' });
						});
					});
				</script>
				<div class="col court-col">
					<img class="basketball-court-img" id="selectedIMG1" src="images/basketball.svg">
				</div>
			</div>
			<div class="row court-row">
				<div class="col court-col">
					<a href="" class="basketball-court" data-court="3" id="court_One">Court 3</a>
				</div>
				<script>
					var basketballcourtNumbers = document.querySelectorAll('.basketball-court');

					basketballcourtNumbers.forEach(function (link) {
						link.addEventListener('click', function (event) {
							event.preventDefault(); // Prevent the default link behavior

							// Get the court number from the data attribute
							var courtNumber = link.getAttribute('data-court');

							// Update the input field with the selected court number
							document.getElementById('basketballcourtNumber').value = 'BasketBall Court ' + courtNumber;
							var forminput2 = document.getElementById('forminput2');
							forminput2.scrollIntoView({ behavior: 'smooth' });
						});
					});
				</script>
				<div class="col court-col">
					<img class="basketball-court-img" id="selectedIMG1" src="images/basketball.svg">
				</div>
			</div>
			<form id="forminput2" action="bookingDatabase.php" method="post">
				<h2 id="h2_sportFacilities">All Field is Required</h2>
				<div class="row">
					<div class="col"  >
						<label for="date">Select the date:</label>
						<input type="date" class="form-control" id="date-basketball" name="date"  required min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('+14 days')); ?>"?><br><br>
					</div>
					
					
				</div>
				
				<div class="col" id="time">
					<label for="timeSlot2">Availability Time Slot</label>
					<div class="time-table2" name="timeSlot" id="timeTableBasketball">
						<!-- Create a grid of time slots here -->
						<div class="time-slot2" data-time="9:00 am-10:00 am">9:00 am-10:00 am</div>
						<div class="time-slot2" data-time="10:00 am-11:00 am">10:00 am-11:00 am</div>
						<div class="time-slot2" data-time="11:00 am - 12:00pm">11:00 am-12:00pm</div>
						<div class="time-slot2" data-time="12:00 pm-1:00pm">12:00 pm-1:00pm</div>
						<div class="time-slot2" data-time="1:00 pm-2:00pm">1:00 pm-2:00pm</div>
						<div class="time-slot2" data-time="2:00 pm-3:00pm">2:00 pm-3:00pm</div>
						<div class="time-slot2" data-time="3:00 pm-4:00pm">3:00 pm-4:00pm</div>
						<div class="time-slot2" data-time="4:00 pm-5:00pm">4:00 pm-5:00pm</div>
						<div class="time-slot2" data-time="5:00 pm-6:00pm">5:00 pm-6:00pm</div>
						<div class="time-slot2" data-time="6:00 pm-7:00pm">6:00 pm-7:00pm</div>
						<div class="time-slot2" data-time="7:00 pm-8:00pm">7:00 pm-8:00pm</div>
						<div class="time-slot2" data-time="8:00 pm-9:00pm">8:00 pm-9:00pm</div>
					</div>
					
					<script>
						
						function BasketballTimeSlot() {
							
							var live = new Date();
							var liveHour = live.getHours();
							var liveMinute = live.getMinutes();

						
							var selectedDateInput = document.getElementById('date-basketball');
							selectedDateInput.addEventListener('change', function () {
								var selectedDate = new Date(selectedDateInput.value);

								
								var timeSlots = document.querySelectorAll('.time-table2#timeTableBasketball .time-slot2');

								
								var isToday = selectedDate.toDateString() === live.toDateString();

								
								timeSlots.forEach(function (timeSlot) {
								
									var timeRange = timeSlot.getAttribute('data-time').split('-');
									var startTime = timeRange[0].trim();
									var beginHour = parseInt(startTime.split(':')[0]);
									var beginMinute = parseInt(startTime.split(':')[1]);

									if (startTime.includes('pm') && beginHour !== 12) {
										beginHour += 12;
									}

									if (isToday && (beginHour < liveHour || (beginHour === liveHour && beginMinute <= liveMinute))) {
										timeSlot.classList.add('disabled');
									} else {
										// This time slot is in the future or for a different date, so enable it
										timeSlot.classList.remove('disabled');
									}
								});
							});
						}

						// Call the function to handle Basketball time slots
						BasketballTimeSlot();
					</script>






					<script>
						var timeselect2 = document.querySelectorAll('.time-slot2');

						timeselect2.forEach(function (slot) {
							slot.addEventListener('click', function () {
								var selectedTime2 = slot.getAttribute('data-time');
								var timeselect2 = document.getElementById('timeSlot2');
								
								timeselect2.value = selectedTime2;
							});
						});

					</script>
					
				</div>
				<div class="row">
					<div class="col">
					<label for="courtNumber">Time Slot:</label>
						<input type="text" class="form-control" id="timeSlot2" name="timeSlot" readonly>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label for="basketballcourtNumber">BasketBall Court Number:</label>
						<input type="text" class="form-control" id="basketballcourtNumber" name="courtNumber" readonly>
					</div>
					
					<div class="col">
						<label for="inputemail" class="form-label">Your-Email:</label>
						<input type="email" class="form-control" id="inputemail" name="InputEmail"  placeholder="email@example.com" required>
						<script>
							
							var inputuserEmail = document.getElementById('inputemail');
							
							
							inputuserEmail.addEventListener('input', function () {
								
								var inputuserEmail = this.value;
							
								
								if (inputuserEmail.length < 0) {
								this.style.color = 'black';
								this.style.fontWeight='normal';
								} 
								else {
								this.style.color = '#31087B'; 
								this.style.fontWeight = "bold";
								}
							});
							</script>
					</div>
					
				</div>
				<div class="row">
					<div class="col">
					<label for="username" class="form-label">Full-Name:</label>
								<input type="text" class="form-control" id="username" name="Username" pattern="[A-Za-z\s]+" placeholder="Low Zhan Xian">
								<script>
									
									var inputFullName = document.getElementById('username');
								  
									
									inputFullName.addEventListener('input', function () {
									 
									  var inputFullName = this.value;
								  
									 
									  if (inputFullName.length < 0) {
										this.style.color = 'black';
										this.style.fontWeight='normal';
									  } 
									  else {
										this.style.color = '#31087B'; 
										this.style.fontWeight = "bold";
									  }
									});
								  </script>
							<script>
								var userNameInput=document.getElementById('username');


								//now we want to disable the user to type the numeric number 
								userNameInput.addEventListener('input',function()
								{
									this.value=this.value.replace(/[0-9]/g, '');
								});
							</script>
					</div>
					
				</div>
				<div class="row">
					<div class="col">
						<label for="contactnumber" class="form-label">Your-Phone:</label>
						<input type="text" class="form-control" id="contactnumber" name="contactNumber" maxlength="10" pattern="(01[0-9][0-9]{7}|03[0-9]{7,8})" placeholder="Enter Your Phone Number" required >
							<script>
									
								var contactnumber = document.getElementById('contactnumber');
								  
									
								contactnumber.addEventListener('input', function () {
									 
								var contactnumber = this.value;
								  
									 
									if (contactnumber.length < 0) {
										this.style.color = 'black';
										this.style.fontWeight='normal';
									  } 
									else {
										this.style.color = '#31087B'; 
										this.style.fontWeight = "bold";
									  }
									});
							</script>
								<script>
									var PhoneInput=document.getElementById('contactnumber');


									//now we want to disable the user to type the numeric number 
									PhoneInput.addEventListener('input',function()
									{
										this.value=this.value.replace(/\D/g, '');
										});
								</script>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="totalPrice2"> Price For One Court:</label>
    					<input type="text" class="form-control" id="totalPrice2" name="totalPrice" readonly>
					</div>
					<script>
						function countPriceCourt() {
							const timeSlotMenu = document.getElementById('timeSlot2');
							const totalPrice = document.getElementById('totalPrice2');
							
							
							const thePrice = 15; // Define the price per hour
							
							// Get the selected value from the time slot menu
							const timeSlotMenuSelected = parseInt(timeSlotMenu.value, 10);
							
							// Calculate the total price
							const priceCourt = thePrice ;
							
							// Set the total price in the input field
							totalPrice.value =priceCourt.toFixed(2);
						}
						
						
						
						// Initial calculation when the page loads
						countPriceCourt();
					</script>
				</div>
				<h4 id="h4_sportFacilities">Customer compulsory to enter the requirement details</h4>
				<h4 id="h4_sportFacilities">The price is fixed and user only can book for 1 hour in select form , if user want book more , after payment done can proceed with same way</h4>
				
					
				<button type="submit" name="book" class="btn btn-outline-info">Confirm To Payment</button>
			</form>

		</div>


		

		<div id="futsalFac" style="display: none;">
			<div class="row">
				<div class="col text-center" id="futsal-col" >
					<div id="futsal_courtNum">
						<a id="a_futsal" class="futsal-court-Number" data-court="1" href="">Court 1</a>
					</div>
					<script>
						var futsalcourtNumbers = document.querySelectorAll('.futsal-court-Number');

						futsalcourtNumbers.forEach(function (link) {
							link.addEventListener('click', function (event) {
								event.preventDefault(); // Prevent the default link behavior

								// Get the court number from the data attribute
								var courtNumber = link.getAttribute('data-court');

								// Update the input field with the selected court number
								document.getElementById('futsalcourtNumber').value = 'Futsal Court ' + courtNumber;
								var forminput3 = document.getElementById('forminput3');
								forminput3.scrollIntoView({ behavior: 'smooth' });
							});
						});
					</script>
					<div class="img-col">
						<img id="futsal_court" src="images/futsal-court.svg">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col text-center" id="futsal-col" >
					<div id="futsal_courtNum">
						<a id="a_futsal" class="futsal-court-Number" data-court="2"  href="">Court 2</a>
					</div>
					<script>
						var futsalcourtNumbers = document.querySelectorAll('.futsal-court-Number');

						futsalcourtNumbers.forEach(function (link) {
							link.addEventListener('click', function (event) {
								event.preventDefault(); // Prevent the default link behavior

								// Get the court number from the data attribute
								var courtNumber = link.getAttribute('data-court');

								// Update the input field with the selected court number
								document.getElementById('futsalcourtNumber').value = 'Futsal Court ' + courtNumber;
								var forminput3 = document.getElementById('forminput3');
								forminput3.scrollIntoView({ behavior: 'smooth' });
							});
						});
					</script>
					<div class="img-col">
						<img id="futsal_court" src="images/futsal-court.svg">
					</div>
				</div>
			</div>




			<form id="forminput3" action="bookingDatabase.php" method="post">
				<h2 id="h2_sportFacilities">All Field is Required</h2>
				<div class="row">
					<div class="col"  >
						<label for="date">Select the date:</label>
						<input type="date" class="form-control" id="date" name="date"  required min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('+14 days')); ?>"?><br><br>
					</div>
					
					
				</div>
				
				<div class="col" id="time">
					<label for="timeSlot">Availability Time Slot</label>
					<div class="time-table" name="timeSlot" id="timeTable">
						<!-- Create a grid of time slots here -->
						<div class="time-slot3" data-time3="9:00 am-10:00 am">9:00 am-10:00 am</div>
						<div class="time-slot3" data-time3="10:00 am-11:00 am">10:00 am-11:00 am</div>
						<div class="time-slot3" data-time3="11:00 am - 12:00pm">11:00 am-12:00pm</div>
						<div class="time-slot3" data-time3="12:00 pm-1:00pm">12:00 pm-1:00pm</div>
						<div class="time-slot3" data-time3="1:00 pm-2:00pm">1:00 pm-2:00pm</div>
						<div class="time-slot3" data-time3="2:00 pm-3:00pm">2:00 pm-3:00pm</div>
						<div class="time-slot3" data-time3="3:00 pm-4:00pm">3:00 pm-4:00pm</div>
						<div class="time-slot3" data-time3="4:00 pm-5:00pm">4:00 pm-5:00pm</div>
						<div class="time-slot3" data-time3="5:00 pm-6:00pm">5:00 pm-6:00pm</div>
						<div class="time-slot3" data-time3="6:00 pm-7:00pm">6:00 pm-7:00pm</div>
						<div class="time-slot3" data-time3="7:00 pm-8:00pm">7:00 pm-8:00pm</div>
						<div class="time-slot3" data-time3="8:00 pm-9:00pm">8:00 pm-9:00pm</div>
					</div>
					
					<script>
						// Get the current date and time
						var live = new Date();
						var liveHour = live.getHours();
						var liveMinute = live.getMinutes();

						// Get the selected date from the input
						var selectedDateInput = document.getElementById('date');
						selectedDateInput.addEventListener('change', function () {
							var selectedDate = new Date(selectedDateInput.value);

							// Get all time slots
							var timeSlots = document.querySelectorAll('.time-slot3');

							// Check if the selected date is today
							var isToday = selectedDate.toDateString() === live.toDateString();

							// Loop through each time slot and disable past time slots
							timeSlots.forEach(function (timeSlot) {
								var timeRange = timeSlot.getAttribute('data-time3').split('-');
								var startTime = timeRange[0].trim();
								var endTime = timeRange[1].trim();
								var beginHour = parseInt(startTime.split(':')[0]);
								var beginMinute = parseInt(startTime.split(':')[1]);

								// 12-hour to 24-hour format conversion
								if (startTime.includes('pm') && beginHour !== 12) {
									beginHour += 12;
								}

								// Check if the time slot is in the past for the selected date
								if (isToday && (beginHour < liveHour || (beginHour === liveHour && beginMinute <= liveMinute))) {
									// This time slot has already passed, so disable it
									timeSlot.classList.add('disabled');
								} else {
									// This time slot is in the future or for a different date, so enable it
									timeSlot.classList.remove('disabled');
								}
							});
						});
					</script>






					<script>
						var timeselect3 = document.querySelectorAll('.time-slot3');

						timeselect3.forEach(function (slot3) {
							slot3.addEventListener('click', function () {
								var selectedTime3 = slot3.getAttribute('data-time3');
								var timeselect3 = document.getElementById('timeSlot3');
								
								timeselect3.value = selectedTime3;
							});
						});

					</script>
					
				</div>
				<div class="row">
					<div class="col">
					<label for="courtNumber">Time Slot:</label>
						<input type="text" class="form-control" id="timeSlot3" name="timeSlot" readonly>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label for="futsalcourtNumber">Futsal Court Number:</label>
						<input type="text" class="form-control" id="futsalcourtNumber" name="courtNumber" readonly>
					</div>
					
					<div class="col">
						<label for="inputemail" class="form-label">Your-Email:</label>
						<input type="email" class="form-control" id="inputemail" name="InputEmail"  placeholder="email@example.com">
						<script>
							
							var inputuserEmail = document.getElementById('inputemail');
							
							
							inputuserEmail.addEventListener('input', function () {
								
								var inputuserEmail = this.value;
							
								
								if (inputuserEmail.length < 0) {
								this.style.color = 'black';
								this.style.fontWeight='normal';
								} 
								else {
								this.style.color = '#31087B'; 
								this.style.fontWeight = "bold";
								}
							});
							</script>
					</div>
					
				</div>
				<div class="row">
					<div class="col">
					<label for="username" class="form-label">Full-Name:</label>
								<input type="text" class="form-control" id="username" name="Username" pattern="[A-Za-z\s]+" placeholder="Low Zhan Xian">
								<script>
									
									var inputFullName = document.getElementById('username');
								  
									
									inputFullName.addEventListener('input', function () {
									 
									  var inputFullName = this.value;
								  
									 
									  if (inputFullName.length < 0) {
										this.style.color = 'black';
										this.style.fontWeight='normal';
									  } 
									  else {
										this.style.color = '#31087B'; 
										this.style.fontWeight = "bold";
									  }
									});
								  </script>
							<script>
								var userNameInput=document.getElementById('username');


								//now we want to disable the user to type the numeric number 
								userNameInput.addEventListener('input',function()
								{
									this.value=this.value.replace(/[0-9]/g, '');
								});
							</script>
					</div>
					
				</div>
				<div class="row">
					<div class="col">
						<label for="contactnumber" class="form-label">Your-Phone:</label>
						<input type="text" class="form-control" id="contactnumber" name="contactNumber" maxlength="10" pattern="(01[0-9][0-9]{7}|03[0-9]{7,8})" placeholder="Enter Your Phone Number" required >
							<script>
									
								var contactnumber = document.getElementById('contactnumber');
								  
									
								contactnumber.addEventListener('input', function () {
									 
								var contactnumber = this.value;
								  
									 
									if (contactnumber.length < 0) {
										this.style.color = 'black';
										this.style.fontWeight='normal';
									  } 
									else {
										this.style.color = '#31087B'; 
										this.style.fontWeight = "bold";
									  }
									});
							</script>
								<script>
									var PhoneInput=document.getElementById('contactnumber');


									//now we want to disable the user to type the numeric number 
									PhoneInput.addEventListener('input',function()
									{
										this.value=this.value.replace(/\D/g, '');
										});
								</script>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="totalPrice3"> Price For One Court:</label>
    					<input type="text" class="form-control" id="totalPrice3" name="totalPrice" readonly>
					</div>
					<script>
						function countPriceCourt() {
							const timeSlotMenu = document.getElementById('timeSlot3');
							const totalPrice = document.getElementById('totalPrice3');
							
							
							const thePrice = 15; // Define the price per hour
							
							// Get the selected value from the time slot menu
							const timeSlotMenuSelected = parseInt(timeSlotMenu.value, 10);
							
							// Calculate the total price
							const priceCourt = thePrice ;
							
							// Set the total price in the input field
							totalPrice.value =priceCourt.toFixed(2);
						}
						
						
						
						// Initial calculation when the page loads
						countPriceCourt();
					</script>
				</div>
				<h4 id="h4_sportFacilities">Customer compulsory to enter the requirement details</h4>
				<h4 id="h4_sportFacilities">The price is fixed and user only can book for 1 hour in select form , if user want book more , after payment done can proceed with same way</h4>
				
					
				<button type="submit" name="book" class="btn btn-outline-info">Confirm To Payment</button>
			</form>

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

