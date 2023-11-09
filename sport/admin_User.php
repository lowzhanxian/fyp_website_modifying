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
	<?php include 'admin_header.php';?>
    <link rel="stylesheet" href="css/admin_user.css">
    
</head>
<body onload="realtime()">
    <?php
        $LOCALHOST = 'localhost';
        $ROOT = 'root';
        $PASSWORD = '';
        $DATABASE = 'sport';
    
        $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $selectquery = "SELECT username AND email AND contactNumber FROM user ";

        
        $result3 =$conn->query($selectquery);

        if($result3){
            while($row3 = $result3->fetch_assoc()){

            
        }
        

        }


    ?>
                
</body>