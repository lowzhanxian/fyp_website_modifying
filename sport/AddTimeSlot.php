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
    <link rel="stylesheet" href="css/Add_Facilities.css">
	<?php include 'admin_header.php';?>
   
</head>
<body onload="realtime()">
    <a href="admin_Facilities.php"  >
        <div class="backdiv">
            <h3 id="h3_back_href">Back</h3>
        </div>
    </a>
    <div class="addFacilities">
        <h2 id="h2_add_Facilities">Add Time Slot</h2>
        <form action="" method="post">
            <div class="firstsection">
                <label for="StartTime"  class="form-label">Start Time:</label>
                <input type="time" class="form-control" id="StartTime" name="StartTime"  required><br><br>
                <div id="cannot" style="color: red;"></div>
            </div>
            
            <div class="secondsection">
                 <label for="EndTime"  class="form-label">End Time:</label>
                <input type="time" class="form-control" id="EndTime" name="EndTime" required><br><br>
                <div id="cannot2" style="color:red;"></div>
            </div>
            <script>
                function isValidTime(timeValue) {
                    return timeValue.endsWith(":00");
                }

                var startTime = document.getElementById("StartTime");
                var disabledmessage = document.getElementById("cannot");
                var disableStarttime = "00:00"; 
                var disableEndtime = "07:00";   

                startTime.addEventListener("input", function () {
                    var selectedTime = startTime.value;
                    if (!isValidTime(selectedTime)) {
                        disabledmessage.textContent = " start time ending must in :00";
                        startTime.value = "";
                    } else if (selectedTime >= disableStarttime && selectedTime < disableEndtime) {
                        disabledmessage.textContent = "Midnight session disabled";
                        startTime.value = ""; 
                    } else {
                        disabledmessage.textContent = ""; 
                    }
                });

                var endTime = document.getElementById("EndTime");
                var messagedisabled = document.getElementById("cannot2");
                var Starttimedisable = "00:00"; 
                var Endtimedisable = "07:00";  

                endTime.addEventListener("input", function () {
                    var Timeselected = endTime.value;
                    if (!isValidTime(Timeselected)) {
                        messagedisabled.textContent = "End time Ending must be in :00";
                        endTime.value = "";
                    } else if (Timeselected >= Starttimedisable && Timeselected < Endtimedisable) {
                        messagedisabled.textContent = "Midnight session disabled";
                        endTime.value = ""; 
                    } else if (Timeselected <= startTime.value) { // New condition added here
                        messagedisabled.textContent = "End time cannot be earlier than or equal to start time";
                        endTime.value = "";
                    } else {
                        messagedisabled.textContent = ""; 
                    }
                });
            </script>
            <div class="thirdsection">
               <label for="pricing"  class="form-label">Pricing(RM):</label>
                <input type="number" class="form-control" id="pricing" name="pricing" maxlength="5" required><br><br>
            </div>
            <div class="thirdsection">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" class="form-control" id="StartDate" name="startDate" min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" required><br><br>
            </div>
            <div class="thirdsection">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="endDate" min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>"required>
                <div id="dateMessage" style="color: red;"></div>
            </div>
            <script>
                var startDate = document.getElementById("StartDate");
                var endDate = document.getElementById("end_date");
                var dateMessage = document.getElementById("dateMessage"); 

                startDate.addEventListener("input", function() {
                if (new Date(startDate.value).getTime() === new Date(endDate.value).getTime()) {
                    dateMessage.textContent = "Start date and end date cannot be the same";
                    startDate.value = "";
                } else {
                    dateMessage.textContent = "";
                }
            });

            endDate.addEventListener("input", function() {
                if (new Date(endDate.value).getTime() === new Date(startDate.value).getTime()) {
                    dateMessage.textContent = "End date and start date cannot be the same";
                    endDate.value = "";
                } else {
                    dateMessage.textContent = "";
                }
            });
            </script>

            

            <br>
            
                <button type="submit" name="addtime" class="btn btn-danger" >Publish</button>
            
        </form>
        <?php
            if (isset($_POST['addtime'])) {
                $LOCALHOST = 'localhost';
                $ROOT = 'root';
                $PASSWORD = '';
                $DATABASE = 'sport';
                $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
            
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                $Sql = "SELECT * FROM timeslot WHERE startTime = ? AND endTime = ? ";
                $checkStmt = $conn->prepare($Sql);
                
            
                if ($checkStmt) {
                    
                    $Start_Time = mysqli_real_escape_string($conn, $_POST['StartTime']);
                    $End_Time = mysqli_real_escape_string($conn, $_POST['EndTime']);
                    $start_Date = mysqli_real_escape_string($conn, $_POST['startDate']);
                    $end_Date = mysqli_real_escape_string($conn, $_POST['endDate']);
                    $Pricing = mysqli_real_escape_string($conn, $_POST['pricing']);
                    
            
                    // Validate input
                    $goAhead = true;
            
                    
            
                    if ($Start_Time == $End_Time) {
                        $goAhead = false;
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Start Time And End Time Must Be Different");'; 
                        echo 'window.location.href = "admin_Facilities.php"';
                        echo '</script>';
                    }
                    if (!is_numeric($Pricing)) {
                        $goAhead = false;
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Invalid Price, Try again.");'; 
                        echo 'window.location.href = "admin_Facilities.php"';
                        echo '</script>';
                    }
            
                    if ($Start_Time >= $End_Time) {
                        $goAhead = false;
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Start Time must be less than End Time.");'; 
                        echo 'window.location.href = "admin_Facilities.php"';
                        echo '</script>';
                    }
            
                    
            
                    
        
                    $checkStmt->bind_param("ss", $Start_Time, $End_Time);
                    $checkStmt->execute();
        
                    $result = $checkStmt->get_result();
        
                    if ($result->num_rows > 0) {
                         echo '<script type="text/javascript">'; 
                        echo 'alert("Time Slot Have Added Before , Try New");'; 
                        echo 'window.location.href = "admin_Facilities.php"';
                        echo '</script>';
                        $goAhead = false;
                    }
                    $checkStmt->close();
                }
        
                if ($goAhead) {
                    $insertSql = "INSERT INTO timeslot (startTime, endTime, startDate, endDate, pricing) VALUES (?, ?, ?, ?, ?)";
                    $insertStmt = $conn->prepare($insertSql);
        
                    if ($insertStmt) {
                        $insertStmt->bind_param("ssssd", $Start_Time, $End_Time, $start_Date, $end_Date, $Pricing);
        
                        if ($insertStmt->execute()) {
                            echo '<script>alert("Time Slot Added");</script>';
                        } else {
                            echo '<script>alert("Error: ' . $insertStmt->error . '");</script>';
                        }
        
                        $insertStmt->close();
                    }
                } 
            
                $conn->close();
            }
            ?>

    </div>
</body>