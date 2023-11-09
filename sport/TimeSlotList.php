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
    <link rel="stylesheet" href="css/CourtList.css">
    <?php include 'admin_header.php';?>

</head>
<body onload="realtime()">
    <div class="backDiv">
        <a href="admin_Facilities.php">Back</a>
    </div>
    <?php
        $dbc = mysqli_connect("localhost", "root", "");
        mysqli_select_db($dbc, "sport");
            $query = mysqli_query($dbc, "SELECT * FROM timeslot ");

            echo '<div class="listingproduct-section">';

            if ($query->num_rows > 0) {
                while ($row1 = $query->fetch_assoc()) {
                    $timeid= $row1['id'];
                    $startTime = $row1['startTime'];
                    $endTime = $row1['endTime'];
                    $startDate = $row1['startDate'];
                    $endDate = $row1['endDate'];
                    $pricing = $row1['pricing'];

                    echo '<div class="card">
                            <a href="TimeSlotListEdit.php?id='.$timeid.'">
                                <div class="card-content">
                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col">
                                                <h5>Start Time:</h5>
                                                <h3>' . $startTime . '</h3>
                                            </div>

                                            <div class="col">
                                                <h5>End Time:</h5>
                                                <h3>' . $endTime . '</h3>
                                            </div>
                                            <div class="col">
                                                <h5>Start Date:</h5>
                                                <h3>' . $startDate . '</h3>
                                            </div>
                                            <div class="col">
                                                <h5>End Date:</h5>
                                                <h3>' . $endDate . '</h3>
                                            </div>
                                            
                                            <div class="col">
                                                <h5>Price:</h5>
                                                <h3>' . $pricing . '</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>';
                }
            } 
            else {
                echo '<p id="emptymessage">No time slots available.</p>';
            }

            echo '</div>';
        
    ?>


       
    </div>
</body>