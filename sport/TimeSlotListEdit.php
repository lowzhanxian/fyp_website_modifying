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
    <link rel="stylesheet" href="css/addproduct.css">
    <link rel="stylesheet" href="css/CourtDetailsEdit.css">
	<?php include 'admin_header.php';?>
      
    
</head>
<body onload="realtime()">
    <?php
        SESSION_START();

        $LOCALHOST = 'localhost';
        $ROOT = 'root';
        $PASSWORD = '';
        $DATABASE = 'sport';
        $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

        if (isset($_GET['id'])) {
            $timeid = $_GET['id'];
            $query = "SELECT * FROM timeslot WHERE id = $timeid";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();

            if ($result && $row) {
                echo '
                    <div class="courtDetails">
                        <form action="" method="post">
                            <div class="firstsection">
                                <label for="start_Time" style="font-size:20px;" class="form-label">Start Time:' . $row['startTime'] . '</label><br>
                                <input type="hidden" class="form-control" id="start_Time"  name="startTime" value="' . $row['startTime'] . '"><br><br>
                                <div id="cannot" style="color:red;"></div>
                            </div>

                            <div class="secondsection">
                                <label for="end_Time"  style="font-size:20px;" class="form-label">End  Time:' . $row['endTime'] . '</label><br>
                                <input type="hidden" class="form-control" id="end_Time" name="endTime" value="' . $row['endTime'] . '"><br><br>
                                <div id="cannot2" style="color:red;"></div>
                            </div>
                            <div class="thirdsection">
                                <label for="price" class="form-label">Price (RM)/Hour:</label><br>
                                <input type="text" class="form-control" id="price" name="Price" value="' . $row['pricing'] . '"><br><br>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" id="update" name="updatenewdetails" class="btn btn-primary">Update</button>
                                </div>
                                <div class="col">
                                    <button type="submit" id="delete" name="deleteTimeslot" class="btn btn-danger">Delete Time Slot</button>
                                </div>
                                <div class="col">
                                    <a href="admin_Facilities.php" id="cancel" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>';
            }
        }

        if (isset($_POST['updatenewdetails'])) {
            $timeid = $_GET['id'];
            $startTime = mysqli_real_escape_string($conn, $_POST['startTime']);
            $endTime = mysqli_real_escape_string($conn, $_POST['endTime']);

            

            $Price = mysqli_real_escape_string($conn, $_POST['Price']);
            if (!is_numeric($Price)) {
                echo '<script type="text/javascript">';
                echo 'alert("Invalid Price, please enter a valid numeric value.");';
                echo '</script>';
            } 
            else {
                $updateSql = "UPDATE timeslot SET startTime = ?, endTime = ?, pricing = ? WHERE id = $timeid";
                $stmt = $conn->prepare($updateSql);
                $stmt->bind_param("ssd", $startTime, $endTime, $Price);

                if ($stmt->execute()) {
                    echo '<script>alert("Time Slot Updated"); window.location.replace("admin_Facilities.php");</script>';
                } else {
                    echo '<script>alert("Error: ' . $stmt->error . '");</script>';
                }
                $stmt->close();
            }
        }

        if (isset($_POST['deleteTimeslot'])) {
            $timeid = $_GET['id'];        
            $query2 = "DELETE FROM timeslot WHERE id = $timeid";

            $queryStatus = $conn->query($query2);
            if ($queryStatus) {
                echo '<script type="text/javascript">';
                echo 'alert("Time Slot removed"); window.location.replace("admin_Facilities.php");';
                echo '</script>';
            } else {
                echo "Something Went Wrong. Please Check and Try Again ";
            }
        }
    ?>

        <script>
            var startTime = document.getElementById("start_Time");
            var disabledmessage = document.getElementById("cannot");
            var disableStarttime = "00:00"; 
            var disableEndtime = "07:00";   

            startTime.addEventListener("input", function () {
                var selectedTime = startTime.value;
                if (selectedTime >= disableStarttime && selectedTime < disableEndtime) {
                    disabledmessage.textContent = "Midnight session disabled";
                    startTime.value = ""; 
                } else {
                    disabledmessage.textContent = ""; 
                }
            });
        </script>

        <script>
            var endTime = document.getElementById("end_Time");
            var messagedisabled = document.getElementById("cannot2");
            var Starttimedisable = "00:00"; 
            var Endtimedisable = "07:00";   

            endTime.addEventListener("input", function () {
                var Timeselected = endTime.value;
                if (Timeselected >= Starttimedisable && Timeselected < Endtimedisable) {
                    messagedisabled.textContent = "Midnight session disabled";
                    endTime.value = ""; 
                } else {
                    messagedisabled.textContent = ""; 
                }
            });
        </script>


</body>