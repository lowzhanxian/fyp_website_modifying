<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CH SC | ADMIN</title>
    <link rel="icon" type="image/x-icon" href="images/title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminDashBoard.css">
	<?php include 'admin_header.php';?>
    
</head>

<body onload="realtime()">
    
		<?php
			$LOCALHOST = 'localhost';
			$ROOT = 'root';
			$PASSWORD = '';
			$DATABASE = 'sport';

			$conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			
			$today = date("Y-m-d");
			$selectquery = "SELECT SUM(totalprice) AS revenue FROM sportfacilitiesreservation WHERE date = '$today'";
			$result = $conn->query($selectquery);

			$today2 = date("Y-m-d");
			$selectquery2 = "SELECT COUNT(*) AS totalreserve FROM sportfacilitiesreservation WHERE date = '$today2'";
			$result2 =$conn->query($selectquery2);



			if ($result) {
				$row = $result->fetch_assoc();
				$revenue = $row['revenue'];
			} else {
				echo "error: " . $conn->error;
			}
			if($result2){
				$row= $result2->fetch_assoc();
				$totalreserve = $row['totalreserve'];
				}
			else{
				echo "error:" ,$conn->error;
			}


			$selectquery = "SELECT COUNT(*) AS totaluser FROM user ";

        
			$result3 =$conn->query($selectquery);
	
			if($result3){
				$row= $result3->fetch_assoc();
				$totaluser= $row['totaluser'];
			}
			else{
				echo "error:" ,$conn->error;
			}
			echo '<div class="row animate-box">
				<div class="TotalRevenue">
					<a href="">
						<div class="program program-schedule">
							<img src="images/adminBookingIMG.png" alt="booking">
							<h3 id="h3_adminDash">Sport Facilities Revenue Today:</h3>
							<h4>RM ' . number_format($revenue, 2) . '</h4>
						</div>
					</a>
				</div>
			</div>';
		

				
			echo
				'<div class="TotalUser">
					<a href="">
						<div class="program program-schedule">
							<img src="images/adminBookingIMG.png" alt="booking">
							<h3 id="h3_adminDash">Total Reservation Today:</h3>
							<h4>'.number_format($totalreserve).'</h4>
						</div>
					</a>
				</div>';

			echo
			'
			<div class="box1" id="box1">
                    <a href="adminViewUser.php">
                        <div class="program program-schedule">
                            <img src="images/adminBookingIMG.png" alt="booking">
                            <h3 id="h3_adminDash">Total User: <span id="totaluserspan">'.number_format($totaluser).'</span></h3>
                            <h4></h4>
                        </div>
                    </a>
                </div>';
			
			
		?>
	
	<div class="row">
		<div class="col">
			<div class="totalreservation">
				<a href="adminViewHistory.php">
					<div class="reservation">
						<img src="images/adminBookingIMG.png" alt="booking">
						<h3 id="h3_adminDash"> Reservation History</h3>
						<h4></h4>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="box2" id="box2">
		<a href="facilities_analytic.php">
			<div class="program program-schedule">
				<img src="images/adminBookingIMG.png" alt="booking">
				<h3 id="h3_adminDash">Analytic facilities</span></h3>
				<h4></h4>
			</div>
		</a>
	</div>
	

	

    
</body>

</html>
