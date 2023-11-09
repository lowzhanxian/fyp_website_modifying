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
    <link rel="stylesheet" href="css/admin_Facilities.css">
	<?php include 'admin_header.php';?>
   
</head>
<body onload="realtime()">
    <a href="Add_Facilities.php">
        <div class="add-Facilities-div">
            <h3 id="h3_manage">Add Facilities</h3>
        </div>
    </a>
    <a href="AddTimeSlot.php">
        <div class="add-time-div">
            <h3 id="h3_manage">Add Time Slot</h3>
        </div>
    </a>
    <div class="backDiv">
        <a href="admin_manageFacilities.php">Back</a>
    </div>
   
    <?php
        $dbc=mysqli_connect("localhost","root","");
        mysqli_select_db($dbc,"sport");

        $query1 = mysqli_query($dbc,"SELECT DISTINCT courtType FROM facilities");
        $query4 = mysqli_query($dbc, "SELECT COUNT(*) AS totalTimeSlot FROM timeslot");

        echo"<div class=\"listingproduct-section2\">";
            while (($row = $query4->fetch_assoc()))
                {
                    $TotalTimeSlot= $row['totalTimeSlot'];
                   
                    echo'<div class="card">
                            <a href="TimeSlotList.php?">
                                <div class="card-content">
                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col">
                                               <h5>Total Time Slot: <h3>'.$TotalTimeSlot.'</h3></h5>
                                            </div>
                                        
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>    
                           
                        </div>';
                }
                    echo"</div>";

        echo"<div class=\"listingproduct-section\">";
            while (($row1 = $query1->fetch_assoc()) )
                {
                    $CourtType= $row1['courtType'];

                    echo'<div class="card">
                            <a href="CourtList.php?courtType='.$CourtType.'">
                                <div class="card-content">
                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col">
                                               <h5>Court Type: <h3>'.$CourtType.'</h3></h5>
                                            </div>
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>    
                           
                        </div>';
                }
                    echo"</div>";
    ?>

       
    </div>
</body>