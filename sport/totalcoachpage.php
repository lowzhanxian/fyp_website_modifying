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
    <link rel="stylesheet" href="css/adminCoach.css">
	<?php include 'admin_header.php';?>
    <link rel="stylesheet" href="css/totalcoachpage.css">
   
</head>
<body onload="realtime()">
    <div class="backDiv">
        <a href="admin_Coach.php">Back</a>
    </div>
    <?php
        $dbc=mysqli_connect("localhost","root","");
        mysqli_select_db($dbc,"sport");

        $query1 = mysqli_query($dbc,"SELECT * FROM coach");

        echo"<div class=\"listingproduct-section\">";
                while (($row1 = $query1->fetch_assoc()))
                {
                    $coachid= $row1['id'];
                    $coachname = $row1['CoachName'];
                    $coachcontact = $row1['Contact'];
                    $timeslot = $row1['TimeSlot'];
                    $trainingprice=$row1['TrainingPrice'];
                    $statusskill=$row1['StatusSkill'];
                    $typesport=$row1['TypeSport'];
                    $capacity=$row1['capacity'];
                   

                
                
                    echo'<div class="card">
                            <a href="viewCoachClassUser.php?coachId='.$coachid.'">
                                <div class="card-content">
                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col">
                                                <h5>ID: <h3>'.$coachid.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Coach name: <h3>'.$coachname.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Contact: <h3>'.$coachcontact.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Time Slot: <h3>'.$timeslot.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Training Price: <h3>'.$trainingprice.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Skill: <h3>'.$statusskill.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Category: <h3>'.$typesport.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>capacity: <h3>'.$capacity.'</h3></h5>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </a>
                        </div>';
                }
                    echo"</div>";





    ?>





</body>