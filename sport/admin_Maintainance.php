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
    <link rel="stylesheet" href="css/admin_Maintainance.css">
    <?php include("admin_header.php");?>
</head>
<body onload="realtime()">
    <div class="backDiv">
        <a href="admin_manageFacilities.php">Back</a>
    </div>
    <a href="Add_Maintainance.php">
        <div class="add-maintainance-div">
            <h3 id="h3_manage">Post Maintainance Annoucement</h3>
        </div>
    </a>
    <?php
        
        $LOCALHOST = 'localhost';
        $ROOT = 'root';
        $PASSWORD = '';
        $DATABASE = 'sport';
        
        $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $selectedDate = null;
        if (isset($_POST['selectedDate'])) {
            $selectedDate = $_POST['selectedDate'];
        }
        
        $query = "SELECT * FROM maintainance";
        if ($selectedDate) {
            $query .= " WHERE posted_date = '$selectedDate'";
        }
        
        $result = $conn->query($query);
        
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        
        $anyData = false; 
        
        
        echo '<form method="post" action="">';
        echo '<input type="date" id="selectDated" class="form-control" name="selectedDate" value="'. ($selectedDate ?? '') .'">';
        echo '<button  class="btn btn-primary" type="submit" value="Filter">Find</button>';
        echo '</form>';
        
       
        
        echo '<table border="1" class="table table-bordered">
            <tr class="tr-maintainance">
                <th>Court Type</th>
                <th>Court Numnber</th>
                <th>Maintainance Start Date</th>
                <th>Maintainance End Date</th>
                <th>Message Content</th>
                <th>Posted Date</th>
                

            </tr>';
        
        while ($row = $result->fetch_assoc()) {
            $anyData = true; 
        
            echo '<tr>';
                echo '<td>' . $row['courtType'] . '</td>';
                echo '<td>' . $row['courtNumber'] . '</td>';
                echo '<td>' . $row['maintenance_date'] . '</td>';
                echo '<td>' . $row['maintenance_end_Date'] . '</td>';
                echo '<td>' . $row['message'] . '</td>';
                echo '<td>' . $row['posted_date'] . '</td>';                
                echo '</tr>';
                
            }
        
        echo '</table>';
        
        if (!$anyData) {
            echo '<p style="color:red;margin-left:800px;margin-top:200px">No Maintainance Scheduling</p>';
        }
        echo '</table>';

            
            
        
        ?>


</body>