<?php session_start();?>
<html>
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
		<link rel="stylesheet" href="css/bootstrap.css">
		

		<link rel="stylesheet" href="css/coach.css">
        <link rel="stylesheet" href="css/coachpage2.css">
    </head>
    <body>
        <div class="coachpage">
            
                <div class="h1">
                    <h1 id="h1_reserve_section">Confirmation </h1>

                </div>

                <?php
                    $LOCALHOST = 'localhost';
                    $ROOT = 'root';
                    $PASSWORD = '';
                    $DATABASE = 'sport';
                    $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

                    $query = "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'";

                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $email = $row['email'];
                        $name = $row['username'];

                        echo 
                        '<div class="confirmCoachSection">
                            <form action="" method="post">
                                <div class="row">
                                        <label for="user_name" id="label_user_name" class="form-label">Name:</label><br>
                                        <input type="text" class="form-control" id="user_name" name="userName" value="' . $name . '" readonly><br>
                                </div>
                                <div class="row">
                                    <label for="user_email" id="label_user_email" class="form-label">Email:</label><br>
                                    <input type="text" class="form-control" id="user_email" name="email" value="' . $email . '" readonly><br><br>
                                </div>';
                        

                                if(isset($_GET['id']))
                                {
                                    $coachdetails=$_GET['id'];
                                    $query2 = "SELECT id, CoachName, Contact, TimeSlot, TrainingPrice, StatusSkill, TypeSport FROM coach WHERE id = '" . $coachdetails . "'";
                                    $result2 = $conn->query($query2);
                                    $row2 = $result2->fetch_assoc();
                                    
                                    if($result2&&$row2){
                                        echo'
                                        <div class="row">
                                                <input type="hidden"  class="form-control" id="coach_name" name="coachid" value="' .  $row2['id'] . '" readonly><br>
                                            </div><div class="row">
                                                <label for="coach_name" class="form-label">Coach Name:</label><br>
                                                <input type="text" class="form-control" id="coach_name" name="coachName" value="' .  $row2['CoachName'] . '" readonly><br>
                                            </div>
                                            <div class="row">
                                                <label for="coachcontact" class="form-label">Coach Contact:</label><br>
                                                <input type="text" class="form-control" id="coachcontact" name="coachContact" value="' . $row2['Contact']. '" readonly><br><br>
                                            </div>
                                            <div class="row">
                                                <label for="timeavailable" class="form-label">Availability Time:</label><br>
                                                <input type="text" class="form-control" id="timeavailable" name="timeSlot" value="' . $row2['TimeSlot'] . '" readonly><br><br>
                                            </div>
                                            <div class="row">
                                                <label for="trainprice" class="form-label">TrainingPrice(RM):</label><br>
                                                <input type="text" class="form-control" id="trainprice" name="trainingPrice" value="' . $row2['TrainingPrice'] . '" readonly><br><br>
                                            </div>
                                            <div class="row">
                                                <label for="skill" class="form-label">SKILL LEVEL:</label><br>
                                                <input type="text" class="form-control" id="skill" name="statusSkill" value="' . $row2['StatusSkill'] . '" readonly><br><br>
                                            </div>
                                            <div class="row">
                                                <label for="category" class="form-label">Category Sport:</label><br>
                                                <input type="text" class="form-control" id="category" name="typeSport" value="' . $row2['TypeSport'] . '" readonly><br><br>
                                            </div>
                                            <br>
                                            
                                            <div class="button">
                                                 <div class="buttontype">
                                                    <button type="submit" id="confirmCoachbutton" name="confirmCoach" class="btn btn-primary"> CONFIRM PAYMENT</button>
                                                </div>
                                               
                                        
                                            </div>
                                        </form>';
                                          
                                    }   
                                }
                               
                    }
                    if (isset($_POST['confirmCoach'])) {
                       
                        $coach_id = $_POST['coachid'];

                        $coach_name = $_POST['coachName'];
                        $coach_contact = $_POST['coachContact'];
                        $coach_availability_time = $_POST['timeSlot'];
                        $trainingprice = $_POST['trainingPrice'];
                        $statusskill = $_POST['statusSkill'];
                        $typesport = $_POST['typeSport']; 
                        $nameUser = $_POST['userName'];
                        $emailUser = $_POST['email']; 
                    
                        $stmt = $conn->prepare("SELECT * FROM reservecoach WHERE coachId = ?  AND timeavailability = ? ");
                        $stmt->bind_param("is", $coach_id, $coach_availability_time);
                        $stmt->execute();
                        $checkResult = $stmt->get_result();

                        if ($checkResult->num_rows > 0) {
                            echo "<script>alert('You have already reserved this class.');</script>";
                        } else {
                            // Insert the reservation into the reservecoach table
                            $reservecoachInsertquery = "INSERT INTO reservecoach
                                (coachId ,nameCoach, coachContact, timeavailability, priceCoach, skillLevelCoach, sportCategoryCoach, nameUser, emailUser) VALUES 
                                ('$coach_id', '$coach_name', '$coach_contact', '$coach_availability_time', '$trainingprice',
                                '$statusskill', '$typesport', '$nameUser', '$emailUser')";
                    
                            // Update the coach's capacity
                            $updateCapacity = "UPDATE coach SET capacity = capacity - 1 WHERE id='$coach_id'";
                    
                            if ($conn->query($reservecoachInsertquery) === TRUE && $conn->query($updateCapacity) === TRUE) {
                                echo "<script>alert('Your reservation was successful. ');</script>";
                            } else {
                                echo "Error: " . $conn->error;
                            }
                        }
                    }
                    
                    
                ?>
                

        </div>
    </body>

</html>
