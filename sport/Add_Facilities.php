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
        <h2 id="h2_add_Facilities">Add Facilities</h2>
        <form action="" method="post">
            <div class="firstsection">
                <label for="Court" class="form-label">Court Number</label>
                <input type="text"class="form-control" id="Court" name="CourtNumber" minlength="1"  required>
                <script>
                    var Input=document.getElementById('Court');
                    Input.addEventListener('input',function()
                        {
                            var pattern = /[^A-Za-z0-9]/g;
                            this.value = this.value.replace(pattern, '');
                        });
                </script>
            </div>
            <div class="secondsection">
                <label for="CourtType" class="form-label">Court Type</label>
                <input type="text"class="form-control" id="CourtType" name="CourtType" maxlength="10" required>
                <script>
                    var Input=document.getElementById('CourtType');
                    Input.addEventListener('input',function()
                        {
                            var pattern = /[^A-Za-z]/g;
                            this.value = this.value.replace(pattern, '');
                        });
                </script>
            </div>
            
            <div class="thirdsection">
                <label for="status"  class="form-label">Status:</label>
                    <select id="status" class="form-select" name="status">
                        <option value="Available">Available</option>
                        <option value="Under Maintenance">Under Maintenance</option>
                        
                        
        
                    </select>
            </div>
            
            
            
            <br>
            
                <button type="submit" name="addFac" class="btn btn-danger" >Publish</button>
            
        </form>
        <?php
            if (isset($_POST['addFac'])) {
                $LOCALHOST = 'localhost';
                $ROOT = 'root';
                $PASSWORD = '';
                $DATABASE = 'sport';
                $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
            
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                $Sql = "SELECT * FROM facilities WHERE courtType = ? AND courtNumber = ?";
                $checkStmt = $conn->prepare($Sql);
                
            
                if ($checkStmt) {
                    $Court_Number = mysqli_real_escape_string($conn, $_POST['CourtNumber']);
                    $Court_Type = mysqli_real_escape_string($conn, $_POST['CourtType']);
                    $Status = mysqli_real_escape_string($conn, $_POST['status']);
            
                    // Validate input
                    $goAhead = true;
            
                    if (strlen($Court_Number) < 1) {
                        $goAhead = false;
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Invalid Court Number, Try again.");'; 
                        echo 'window.location.href = "admin_Facilities.php"';
                        echo '</script>';
                    }
            
                    
            
                
            
                    $checkStmt->bind_param("ss", $Court_Type, $Court_Number);
                    $checkStmt->execute();

                    $result = $checkStmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<script type='text/javascript'>alert('Exists Found, Try Again');</script>";
                        $goAhead = false;
                    }
                    $checkStmt->close();


                }
            
                if ($goAhead) {
                    // Insert data
                    $insertSql = "INSERT INTO facilities (courtNumber, courtType, status) 
                                VALUES (?, ?, ?)";
            
                    $insertStmt = $conn->prepare($insertSql);
            
                    if ($insertStmt) {
                        $insertStmt->bind_param("sss", $Court_Number, $Court_Type, $Status);
            
                        if ($insertStmt->execute()) {
                            echo "<script type='text/javascript'>alert('Facilities Published');</script>";
                        } else {
                            echo "Error: " . $insertStmt->error;
                        }
            
                        $insertStmt->close();
                    }
                }
            
                $conn->close();
            }
            
                ?>

    </div>
</body>