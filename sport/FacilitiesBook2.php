<?php
    session_start(); 

   
?>

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
        <link rel="stylesheet" href="css/FacilitiesBook2.css">

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
                <div id="ViewBookedCourt" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2 id="checkBookH2">Booked Courts</h2>
                        <div >
                            <h5 id="bookedCourtsList"></h5>
                        </div>
                    </div>
                </div>
                <button id="checkBookedCourts">Check Booked Courts</button>
                <script>
                    var modal = document.getElementById('ViewBookedCourt');
                    var btn = document.getElementById('checkBookedCourts');
                    var span = document.getElementsByClassName('close')[0];

                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                        modal.style.display = "block";
                        
                        // Fetch the booked courts from the database here
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'fetchBookedCourts.php', true);
                        xhr.onload = function() {
                            if (this.status == 200) {
                                document.getElementById('bookedCourtsList').innerHTML = this.responseText;
                            } else {
                                console.error("Failed to fetch booked courts.");
                            }
                        };
                        xhr.send();
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                </script>

                <?php
                     $dbc = mysqli_connect("localhost", "root", "");
                     mysqli_select_db($dbc, "sport");

                     if (isset($_GET['courtType'])) {
                        $courtSelected= mysqli_real_escape_string($dbc, $_GET['courtType']);
                        echo '<div ><h3 id="title">' . $courtSelected . '</h3></div>';
                    }
                    
                    $currentDay = date('l');
                    $currentDate = date('Y-m-d'); 
                   
                    echo "<div id='currentDateDay'><h5>$currentDay  $currentDate</h5></div>" ;


                    

                ?>
                <div class="form">
                    <form action="" method="post">
                        <h2 id="h2_sportFacilities">All Fields are Required</h2>
                        <h2 id="h2_sportFacilities">After Booking Confirm Payment ,User Not Able to Cancel or Refund</h2>

                        <div class="row">
                            <div class="col">
                                <label for="date-facilities" class="form-label" id="facilities-date">Select the date:</label>
                                <input type="date" class="form-control" id="date-facilities" name="date" required min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('+14 days')); ?>" onchange="updateCurrentDate()"><br><br>
                            </div>
                        </div>
                        <script>
                            function updateCurrentDate() {
                                var selectedDate = document.getElementById("date-facilities").value;
                                var selectedDateObj = new Date(selectedDate);

                                var daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                                var selectedDay = daysOfWeek[selectedDateObj.getDay()];

                                document.getElementById("currentDateDay").innerHTML = "<h5>" + selectedDay + " " + selectedDate + "</h5>";

                                // Fetch available time slots using AJAX for the selected date
                                fetch('fetch_timeslots.php?date=' + selectedDate)
                                .then(response => response.text())
                                .then(data => {
                                    // Update your time slot table with the received data
                                    document.querySelector('.time-slot-table').innerHTML = data;
                                });
                            }
                        </script>
                        <div class="time-slot-table">

                        </div>


                        
                        <?php
                            $dbc = mysqli_connect("localhost", "root", "");
                            mysqli_select_db($dbc, "sport");
                            $courtType = mysqli_real_escape_string($dbc, $_GET['courtType']);
                            $stmt = $dbc->prepare("SELECT DISTINCT courtNumber, status FROM facilities WHERE courtType = ?");
                            $stmt->bind_param("s", $courtType);
                            $stmt->execute();
                            
                            echo '<table class="table ">';
                            echo '<th >Court Number</th>';
                            echo '<tbody>';
                            
                            $stmt->store_result();
                            $stmt->bind_result($courtNumber, $courtStatus);
                            while ($stmt->fetch()) {
                                if ($courtStatus === "Under Maintenance") {
                                    echo '<tr>';
                                    echo '<td style="color: black;cursor: not-allowed;"><span > '.$courtType.' ' . $courtNumber . ' (Under Maintenance)</span></td>';
                                    echo '</tr>';
                                } else {
                                    echo '<tr>';
                                    echo '<td class="court-Number" data-court="' . $courtNumber . '"  data-type="'.$courtType.'"> '.$courtType.'  ' . $courtNumber . '</td>';
                                    echo '</tr>';
                                }
                            }
                            echo '</tbody>';
                            echo '</table>';
                            
                            $userdetails = mysqli_query($dbc, "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'");

                            while ($row1 = $userdetails->fetch_assoc()) {
                                $email = $row1['email'];
                                $name = $row1['username'];
                                $phone = $row1['contactNumber'];
                                echo '<div class="confirmtitle">';
                                echo '<h1 id="confirmBooktitle_h1">Your Details</h1>';
                                echo '</div>';
                                echo '
                                <div class="row">
                                    <div class="col text-center">
                                        <h1 id="labeluser_name">Name</h1>
                                        <label for="user_name" id="label_user_name" class="form-label">' . $name . '</label>
                                        <input type="text" id="user_name" name="userName" style="display:none" value="' . $name . '" readonly><br>
                                    
                                    </div>
                                   <div class="col text-center">
                                        <h1 id="labeluser_email">Your Email</h1>
                                        <label for="user_email" id="label_user_email" class="form-label">' . $email . '</label>
                                        <input type="text" id="user_email" name="email" style="display:none" value="' . $email . '" readonly><br><br>
                                    </div>
                                    <div class="col text-center">
                                        <h1 id="labeluser_phone">Your Phone</h1>
                                        <label for="user_phone" id="label_user_phone" class="form-label">' . $phone . '</label>
                                        <input type="text" id="user_phone" name="phone" style="display:none" value="' . $phone . '" readonly><br><br>
                                    </div>
                               </div>
                                
                                
                                ';
                                $stmt->close();
                            $dbc->close();
                            }

                           
                        ?>
                        <div class="row">
                                <div class="col text-center">
                                    <label for="courttime" class="form-label" id="titleCourtime">Court Time:</label>
                                    <input type="text" class="form-control" id="courttime" name="courttime" readonly>
                                </div>
                                <div class="col text-center">
                                    <label for="courtPrice" class="form-label">Court Price / Hour:</label>
                                    <input type="text" class="form-control" id="courtPrice" name="courtPrice" readonly>
                                </div>
                                <div class="col text-center">
                                    <label for="courtNumber" class="form-label" id="titleCourNum">Court Number:</label>
                                    <input type="text" class="form-control" id="courtNumber" name="courtNumber" readonly>
                                </div>
                        
                            
                         </div>
                         <h4 id="h4_sportFacilities" >Click Confirm Payment To Book </h4>
                         <div id="bookfacdivbutton" class="row text-center">
                            <button type="submit" id="BookFacButton" class="btn btn-primary" name="bookfac">Confirm Payment</button>
                        </div>                            
                        <p style="color:black;text-align:center;">By clicking 'Confirm Payment' you agree to our <a href="#" style="color:blue;">Terms of Service</a> and <a href="#" style="color:blue;">Privacy Policy</a>.</p>

                    </form>
                </div>
                <?php
                    if (isset($_POST['bookfac'])) 
                    {
                        $LOCALHOST = 'localhost';
                        $ROOT = 'root';
                        $PASSWORD = '';
                        $DATABASE = 'sport';

                        $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } else {
                            if(empty($_POST["date"]) || empty($_POST["courttime"]) ||  empty($_POST["courtNumber"])) {
                                echo '
                                    <div id="opendiv" class="error">
                                        <div class="content">        
                                            <p id="p">Please Select All Requirements</p>
                                        </div>
                                    </div>
                                    <script>
                                        var openDiv = document.getElementById("opendiv");
                                        var closeDiv = document.getElementById("closediv");
                                
                                        function openModal() {
                                            openDiv.style.display = "block";
                                        }
                                
                                        function closeModal() {
                                            openDiv.style.display = "none";
                                        }
                            
                                        openModal();
                            
                                        setTimeout(function() {
                                            window.location.replace(\'FacilitiesBook.php\');
                                        },1000);
                                    </script>';
                                return; 
                            }
                            // Validate and sanitize user inputs (e.g., use mysqli_real_escape_string)
                            $date = mysqli_real_escape_string($conn, $_POST['date']);
                            $timeSlot = mysqli_real_escape_string($conn, $_POST['courttime']);
                            $courtNumber = mysqli_real_escape_string($conn, $_POST['courtNumber']); // Define $courtNumber
                            $userEmail = mysqli_real_escape_string($conn, $_POST['email']);
                            $username = mysqli_real_escape_string($conn, $_POST['userName']);
                            $contactNumber = mysqli_real_escape_string($conn, $_POST['phone']);
                            $totalPrice = mysqli_real_escape_string($conn, $_POST['courtPrice']);

                        
                            $checkSql = "SELECT * FROM sportfacilitiesreservation WHERE facilitytypecourtnumber = '$courtNumber' AND date = '$date' AND timeslot = '$timeSlot'";
                            $checkResult = $conn->query($checkSql);
                            
                            

                            if ($checkResult->num_rows > 0) {
                                echo '
                                        <div id="opendiv" class="success">
                                            <div class="content">
                                                
                                                <p id="p">Court Rented. Please Try Another Court or Time Slot</p>
                                            </div>
                                        </div>
                                        <script>
                                            var openDiv = document.getElementById("opendiv");
                                            var closeDiv = document.getElementById("closediv");
                                    
                                            function openModal() {
                                                openDiv.style.display = "block";
                                            }
                                    
                                            function closeModal() {
                                                openDiv.style.display = "none";
                                            }
                            
                                    
                                            openModal();

                                            setTimeout(function() {
                                                window.location.replace(\'FacilitiesBook.php\');
                                            },1000);
                                        </script>';
                            } else {
                            
                                $insertSql = "INSERT INTO sportfacilitiesreservation (date, timeslot, facilitytypecourtnumber, useremail, username, contactnumber, totalprice) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";

                                $stmt = $conn->prepare($insertSql);
                                $stmt->bind_param("ssssssd", $date, $timeSlot, $courtNumber, $userEmail, $username, $contactNumber, $totalPrice);

                                if ($stmt->execute()) {
                                    echo '
                                        <div id="opendiv" class="success">
                                            <div class="content">
                                                
                                                <p id="p">You Have Rent Successfuly.</p>
                                            </div>
                                        </div>
                                        <script>
                                            var openDiv = document.getElementById("opendiv");
                                            var closeDiv = document.getElementById("closediv");
                                    
                                            function openModal() {
                                                openDiv.style.display = "block";
                                            }
                                    
                                            function closeModal() {
                                                openDiv.style.display = "none";
                                            }
                            
                                    
                                            openModal();

                                            setTimeout(function() {
                                                window.location.replace(\'FacilitiesBook.php\');
                                            },1000);
                                        </script>';
                                } else {
                                // Handle errors
                                }

                                $stmt->close();
                                    }
                                }
                    }
                ?>
                
                


                <script>
                    function updateInputFields(element) {
                    // Get data attributes from the clicked element
                    var selectedTime = element.getAttribute("data-time");
                    var selectedPrice = element.getAttribute("data-price");

                    // Update the input fields with the selected values
                    document.getElementById("courttime").value = selectedTime;
                    document.getElementById("courtPrice").value = selectedPrice;
                }
                </script>

                <script>
                    var courtNumbers = document.querySelectorAll(".court-Number");
                    var courtNumberInput = document.getElementById("courtNumber");
                    

                    courtNumbers.forEach(function (element) {
                        element.addEventListener("click", function (event) {
                            event.preventDefault();
                            var courtNumber = element.getAttribute("data-court");
                            var courtType=element.getAttribute("data-type")

                            // Set the background color for the clicked court
                            element.style.backgroundColor = "red";
                            element.style.border = "none";

                            // Remove the background color from other courts
                            courtNumbers.forEach(function (selected) {
                                if (selected !== element) {
                                    selected.style.backgroundColor = "";
                                }
                            });

                            if (courtNumberInput) {
                                courtNumberInput.value = courtType + courtNumber;
                            }
                            
                        });
                    });
                </script>



				



						
            </div>
            <!-- END sportfacilities-content -->
            <br><br>
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

