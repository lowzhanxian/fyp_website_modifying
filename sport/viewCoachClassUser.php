<?php session_start() ?>

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
    <link rel="stylesheet" href="css/totalcoachpage.css">
    <link rel="stylesheet" href="css/viewCoachClassUser.css">
    <?php include("admin_header.php");?>
   
</head>
<body onload="realtime()">
    <div class="backDiv">
        <a href="totalcoachpage.php">Back</a>
    </div>
    <?php
        $dbc = mysqli_connect("localhost", "root", "");
        mysqli_select_db($dbc, "sport");

        if(isset($_GET['coachId'])) {
            $coachId = $_GET['coachId'];
            $coachId = mysqli_real_escape_string($dbc, $coachId);
        } else {
            die("Coach ID is missing!");
        }

        $query = mysqli_query($dbc, "SELECT * FROM reservecoach WHERE coachId=$coachId");

        $anyData = false; 

        echo '<table border="1" class="table table-bordered">
            <tr class="tr-equipment">
                <th>Name User</th>
                <th>Email User</th>
                <th>Price</th>
                <th>Reserve Date</th>
            </tr>';
        
        while ($row = mysqli_fetch_assoc($query)) {
            $anyData = true; 
        
            echo '<tr>';
                echo '<td>' . $row['nameUser'] . '</td>';
                echo '<td>' . $row['emailUser'] . '</td>';
                echo '<td>' . $row['priceCoach'] . '</td>';
                echo '<td>'. $row['reserveDate'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        if (!$anyData) {
            echo '<p style="color:red;margin-left:800px;margin-top:200px">No User Reserve</p>';
        }
        echo '</table>';
    ?>






</body>