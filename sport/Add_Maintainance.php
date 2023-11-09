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
    <link rel="stylesheet" href="css/Add_Maintainance.css">
	<?php include 'admin_header.php';?>
   
</head>
<body onload="realtime()">
    <a href="admin_Maintainance.php"  >
        <div class="backdiv">
            <h3 id="h3_back_href">Back</h3>
        </div>
    </a>
    <div class="addMaintainance">
        <h2 id="h2_add_Maintainance">Post Maintainance Annoucement</h2>
        <form action="" method="post">
            <div class="firstsection">
                <label for="Court" class="form-label">Court Number:</label>
                <input type="text"class="form-control" id="Court" name="courtNumber" minlength="1"  required>
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
                <label for="CourtType" class="form-label">Court Type:</label>
                <input type="text"class="form-control" id="CourtType" name="courtType" maxlength="10" required>
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
                <label for="MaintainanceStartDate"  class="form-label">Maintainance Start Date:</label>
                <input type="date" class="form-control" id="MaintainanceStartDate" name="maintainancStartDate" required min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('+30 days')); ?>"? required><br><br>
                
            </div>
            
            <div class="fourthsection">
                <label for="maintainanceEndDate"  class="form-label">Maintainance End Time:</label>
                <input type="date" class="form-control" id="maintainanceEndDate" name="maintainanceEndDate" min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('+30 days')); ?>"? required><br><br>
            </div>

            <div class="fifthsection">
                <label for="message" class="form-label">Message:</label>
                <textarea id="message" name="pupupehpeh" class="form-control" ></textarea>
            </div>
            <div class="sixsection">
                <label for="posted_date"  class="form-label">Post Date:</label>
                <input type="date" class="form-control" id="posted_date" name="postedDate" required min="<?php echo date('Y-m-d', strtotime('today')); ?>" max="<?php echo date('Y-m-d', strtotime('0 days')); ?>"? required><br><br>       
            </div>

            <br>
            
            <button type="submit" name="addMain" class="btn btn-danger" >Post</button>
            
        </form>

        <?php
        if (isset($_POST['addMain'])) {
            $LOCALHOST = 'localhost';
            $ROOT = 'root';
            $PASSWORD = '';
            $DATABASE = 'sport';
            $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            
            $Sql = "SELECT * FROM maintainance WHERE courtNumber = ? AND courtType = ? AND posted_date = ?";
            $checkStmt = $conn->prepare($Sql);
             
            if ($checkStmt) {
                $Court_Number = mysqli_real_escape_string($conn, $_POST['courtNumber']);
                $Court_Type = mysqli_real_escape_string($conn, $_POST['courtType']);
                $startDate = mysqli_real_escape_string($conn, $_POST['maintainancStartDate']);
                $endDate = mysqli_real_escape_string($conn, $_POST['maintainanceEndDate']);
                $message = mysqli_real_escape_string($conn, $_POST['pupupehpeh']);
                $postDate = mysqli_real_escape_string($conn, $_POST['postedDate']);

                // Validate input
                $goAhead = true;

                if (strlen($Court_Number) < 1) {
                    $goAhead = false;
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Invalid Court Number,Try again.");'; 
                    echo 'window.location.href = "admin_Facilities.php"';
                    echo '</script>';
                }
                if(strlen($Court_Type) < 2){
                    $goAhead = false;
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Invalid Court Type,Try again.");'; 
                    echo 'window.location.href = "admin_Facilities.php"';
                    echo '</script>';
                }
                
                if($startDate > $endDate){
                    $goAhead = false;
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Start Date Should Be Less Than End Date");'; 
                    echo 'window.location.href = "admin_Facilities.php"';
                    echo '</script>';
                }
               
                

                $checkStmt->bind_param("sss", $Court_Number, $Court_Type,$postDate);
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
                $insertSql = "INSERT INTO maintainance (courtType, courtNumber, maintenance_date, maintenance_end_Date, `message`, posted_date) 
                            VALUES (?, ?, ?, ?, ?, ?)";

                $insertStmt = $conn->prepare($insertSql);

                if ($insertStmt) {
                    $insertStmt->bind_param("ssssss", $Court_Number, $Court_Type, $startDate, $endDate, $message, $postDate);

                    if ($insertStmt->execute()) {
                        echo "<script type='text/javascript'>alert('Posted');</script>";
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